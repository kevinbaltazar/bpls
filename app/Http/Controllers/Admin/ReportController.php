<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clearance;
use App\Models\Admin;
use Illuminate\Support\Carbon;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;
use App\Support\GeneralSettings;


class ReportController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role:superadmin,admin']);
    }


    public function index(GeneralSettings $settings){

        $captain = Admin::find($settings->captain);
        
        session('reports', []);
        session('sum', []);
        session('captain', []);
        session('date_from', []);
        session('date_to', []);
        session('count', []);

        $reports = Clearance::whereNotNull("signed_at")->orWhereNotNull('renew_signed_at')->paginate(8);
        $sum =  $reports->sum('amount');
        $count = $reports->count('id');
        session()->put('count', $count);
        session()->put('reports', $reports);
        session()->put('sum', $sum);
        session()->put('captain', $captain);
        return view('admin.admins.reports', compact('reports'));
    }

    public function filter(GeneralSettings $settings, Request $request){
        
        $date_from = Carbon::parse($request->date_from)->format('Y-m-d')." 00:00:00";
        $date_to = Carbon::parse($request->date_to)->format('Y-m-d')." 23:59:59";

        session()->put('date_from', $date_from);
        session()->put('date_to', $date_to);
        
        if($request->date_from === NULL || $request->date_to === NULL){
            $reports = Clearance::paginate(30);
            $sum = $reports->sum('amount');
            $count = $reports->count('id');
            session()->put('count', $count);
            session()->put('reports', $reports);
            session()->put('sum', $sum);
            return view('admin.admins.reports', compact('reports'));
        }
        else
        {
            $reports = Clearance::whereBetween('created_at', [$date_from, $date_to])->paginate(30);
            $sum = $reports->sum('amount');
            $count = $reports->count('id');
            session()->put('count', $count);
            session()->put('reports', $reports);
            session()->put('sum', $sum);
            return view('admin.admins.reports', compact('reports'));
        }
        
    }

    public function exportPDF() {

        $pdf = PDF::loadView('admin.clearances.pdfReports', ['reports' => session('reports'), 'sum' => session('sum'), 'captain' => session('captain') , 'date_from' => session('date_from'), 'date_to' => session('date_to'), 'count' => session('count')]);
        return $pdf->setPaper('a4')->setOrientation('portrait')->setOption('margin-top', 5)->download('export' . '.pdf');
    
    }

}
