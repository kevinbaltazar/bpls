<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class ClearanceStatus extends Enum
{
    const Incomplete = 'incomplete';
    const Pending = 'pending';
    const Reviewed = 'reviewed';
    const Inspected = 'inspected';
    const Approved = 'approved';
    const Rejected = 'rejected';
    const Expired = 'expired';
}
