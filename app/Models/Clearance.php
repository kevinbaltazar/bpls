<?php

namespace App\Models;

use App\Enums\ClearanceStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Permission\Models\Role;

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

        return ClearanceStatus::Incomplete;
    }

    public function reject()
    {
        $this->update(['rejected_at' => now()]);
    }

    public function approve($formData)
    {
        if ($this->status === ClearanceStatus::Pending) {
            return $this->update([
                'requirements_approved_at' => now(),
                'clearance_inspector_id' => $formData['inspector']
            ]);
        }

        if ($this->status === ClearanceStatus::Reviewed) {
            return $this->update(['inspected_at' => now()]);
        }

        if ($this->status === ClearanceStatus::Inspected) {
            return $this->update(['signed_at' => now()]);
        }
    }

    public function scopeManageable($query, Role $role = null)
    {
        $query
            ->whereNotNull('completed_at')
            ->whereNull('rejected_at');

        if ($role->name === 'reviewer') {
            return $query->whereNull('requirements_approved_at')
                ->whereNull('inspected_at');
        }

        if ($role->name === 'inspector') {
            return $query->whereNotNull('requirements_approved_at')
                ->whereNull('inspected_at')
                ->whereNull('signed_at');
        }

        if ($role->name === 'approver') {
            return $query->whereNotNull('inspected_at')
                ->whereNull('signed_at')
                ->whereNull('rejected_at');
        }

        if ($role->name === 'dispatcher') {
            return $query->whereNotNull('signed_at')
                ->whereNull('rejected_at');
        }
    }

    public static function generateControlNumber()
    {
        $year = now()->format('Y');

        $clearance = Clearance::query()
            ->where('control_number', 'like', "{$year}-%")
            ->orderByDesc('control_number')
            ->first();

        $number = (int) explode('-', $clearance->control_number)[1];

        return $year . '-' . str_pad($number + 1, 5, '0', STR_PAD_LEFT);
    }
}
