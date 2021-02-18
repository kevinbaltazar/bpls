<?php

namespace App\Models;

use App\Enums\ClearanceStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Permission\Models\Role;
use Nexmo\Laravel\Facade\Nexmo;
use Illuminate\Support\Facades\Auth;

class Clearance extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory;

    protected $table = 'clearances';
    protected $guarded = [];

    public function inspector()
    {
        return $this->belongsTo(Admin::class, 'clearance_inspector_id');
    }

    public function getFullNameAttribute()
    {
        return implode(' ', $this->only(['first_name', 'middle_name', 'last_name']));
    }

    public function getStatusAttribute()
    {
        if(!$this->clearance_id) {
            if ($this->rejected_at) {
                return ClearanceStatus::Rejected;
            }
    
            if ($this->signed_at) {
                return ClearanceStatus::Approved;
            }
    
            if ($this->inspected_at) {
                return ClearanceStatus::Inspected;
            }
    
            if ($this->requirements_approved_at) {
                return ClearanceStatus::Reviewed;
            }
    
            if ($this->completed_at) {
                return ClearanceStatus::Pending;
            }
        }
        else {
            if ($this->renew_rejected_at) {
                return ClearanceStatus::Rejected;
            }

            if ($this->renew_signed_at) {
                return ClearanceStatus::Approved;
            }

            if ($this->renew_inspected_at) {
                return ClearanceStatus::Inspected;
            }
    
            if($this->renew_requirements_approved_at) {
                return ClearanceStatus::Reviewed;
            }
    
            if($this->renew_completed_at) {
                return ClearanceStatus::Pending;
            }
        }

        return ClearanceStatus::Incomplete;
    }

    public function reject()
    {
        if(!$this->clearance_id) {
            $this->update([
                'rejected_at' => now(),
                'rejected_by' => Auth::guard('admin')->user()->name,
                ]);
        }
        else {
            $this->update([
                'renew_rejected_at' => now(),
                'rejected_by' => Auth::guard('admin')->user()->name,
                ]);
        }
    }

    public function approve($formData)
    {
        if ($this->status === ClearanceStatus::Pending) {
            if($this->renew_completed_at){
                return $this->update([
                    'renew_requirements_approved_at' => now(),
                    'clearance_inspector_id' => $formData['inspector'],
                    'reviewed_by' => Auth::guard('admin')->user()->name,
                ]);
            }
            else{
                return $this->update([
                    'requirements_approved_at' => now(),
                    'clearance_inspector_id' => $formData['inspector'],
                    'reviewed_by' => Auth::guard('admin')->user()->name,
                ]);
            }
        }

        if ($this->status === ClearanceStatus::Reviewed) {
            if(!$this->clearance_id) {
                return $this->update([
                    'inspected_at' => now(),
                    'inspected_by' => Auth::guard('admin')->user()->name,
                ]);
            }
            else {
                return $this->update([
                    'renew_inspected_at' => now(),
                    'inspected_by' => Auth::guard('admin')->user()->name,
                    ]);
            }
        }

        if ($this->status === ClearanceStatus::Inspected) {
            if(!$this->clearance_id) {
                Nexmo::message()->send([
                    'to'   => $this->mobile_number,
                    'from' => 'Pulong Buhangin',
                    'text' => "Your application was already processed. Kindly get your document. Note: Bring ID, wear your face mask and face shield."
                ]);
                return $this->update([
                    'signed_at' => now(),
                    'approved_by' => Auth::guard('admin')->user()->name,
                    ]);
            }
            else {
                return $this->update([
                    'renew_signed_at' => now(),
                    'approved_by' => Auth::guard('admin')->user()->name,
                    ]);
            }           
        }
    }

    public function scopeManageable($query, Role $role = null)
    {
        $query->where(function ($query) {
            $query->where('completed_at', '!=', NULL)
                  ->orWhere('renew_completed_at', '!=', NULL);
        })->where(function ($query) {
            $query->where('rejected_at', '=', NULL)
                  ->orWhere('renew_rejected_at', '=', NULL);
        });

        if ($role->name === 'reviewer') {
            return $query->where(function ($query){
                $query->where('requirements_approved_at', '=', NULL)
                    ->where('renew_requirements_approved_at', '=', NULL);
            })->where(function ($query){
                $query->where('inspected_at', '=', NULL)
                    ->where('renew_inspected_at', '=', NULL);
            });
        }

        if ($role->name === 'inspector') {
           return $query->where(function ($query){
                $query->where('requirements_approved_at', '!=', NULL)
                    ->orwhere('renew_requirements_approved_at', '!=', NULL);
           })->where(function ($query){
                $query->where('inspected_at', '=', NULL)
                    ->where('renew_inspected_at', '=', NULL);
           })->where(function ($query){
                $query->where('signed_at', '=', NULL)
                    ->where('renew_signed_at', '=', NULL);
           });
        }

        if ($role->name === 'approver') {
            return $query->where(function ($query){
                $query->where('inspected_at', '!=', NULL)
                    ->orwhere('renew_inspected_at', '!=', NULL);
           })->where(function ($query){
                $query->where('signed_at', '=', NULL)
                    ->where('renew_signed_at', '=', NULL);
           })->where(function ($query){
                $query->where('rejected_at', '=', NULL)
                    ->where('renew_rejected_at', '=', NULL);
           });
        }

        if ($role->name === 'dispatcher') {
            return $query->where(function ($query){
                $query->where('signed_at', '!=', NULL)
                    ->orwhere('renew_signed_at', '!=', NULL);
           })->where(function ($query){
                $query->where('rejected_at', '=', NULL)
                    ->where('renew_rejected_at', '=', NULL);
           })->where(function ($query){
                $query->where('printed_at', '=', NULL)
                    ->where('renew_printed_at', '=', NULL);
           });
        }
        
        if ($role->name === 'superadmin'){
            $query->where(function ($query){
                $query->where('rejected_at', '=', NULL)
                    ->orwhere('renew_rejected_at', '=', NULL);
            })->where(function ($query){
                $query->where('printed_at', '=', NULL)
                    ->where('renew_printed_at', '=', NULL);
            });
        }
    }

    public static function generateControlNumber()
    {
        $year = now()->format('Y');

        $clearance = Clearance::query()
            ->where('control_number', 'like', "{$year}-%")
            ->orderByDesc('control_number')
            ->first();

        if ($clearance === null) {

            $control_num = $clearance->control_number ?? $year .'-00000';
            $number = (int) explode('-',  $control_num)[1];
            return $year . '-' . str_pad($number + 1, 5, '0', STR_PAD_LEFT);

        }

        $number = (int) explode('-', $clearance->control_number)[1];
        return $year . '-' . str_pad($number + 1, 5, '0', STR_PAD_LEFT);
    }
}
