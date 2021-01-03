<?php

namespace App\Models;

use App\Enums\ClearanceStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Clearance extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory;

    protected $table = 'clearances';
    protected $guarded = [];

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
}
