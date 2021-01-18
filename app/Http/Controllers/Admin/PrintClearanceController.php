<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Clearance;
use App\Support\GeneralSettings;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PrintClearanceController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \GeneralSettings
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clearance  $clearance
     * @return \Illuminate\Http\Response
     */
    public function __invoke(GeneralSettings $settings, Request $request, Clearance $clearance)
    {
        $formData = $request->validate([
            'order_number' => ['required'],
            'amount' => ['required', 'numeric'],
            'sticker_number' => ['required', 'numeric'],
        ]);

        if ($clearance->control_number === null) {
            $controlNumber = Clearance::generateControlNumber();
            $clearance->update(['control_number' => $controlNumber]);
            $clearance->update(['printed_at' => now()]);
        }

        $secretary = Admin::find($settings->secretary);
        $captain = Admin::find($settings->captain);

        $pdf = PDF::loadView('admin.clearances.pdf', compact('clearance', 'formData', 'secretary', 'captain'))
            ->setPaper('legal')
            ->setOption('margin-bottom', 0);


        return $pdf->download('Clearance_' . $clearance->business_name . '.pdf');
    }
}
