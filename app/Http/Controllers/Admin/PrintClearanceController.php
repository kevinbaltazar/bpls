<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Clearance;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;
use Illuminate\Http\Request;

class PrintClearanceController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clearance  $clearance
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Clearance $clearance)
    {
        $formData = $request->validate([
            'order_number' => ['required'],
            'amount' => ['required', 'numeric'],
            'sticker_number' => ['required', 'numeric'],
        ]);

        $pdf = PDF::loadView('admin.clearances.pdf', compact('clearance', 'formData'))
            ->setPaper('a4')
            ->setOption('margin-bottom', 0);

        return $pdf->download('clearance.pdf');
    }
}
