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

        $reports = Clearance::whereNotNull('control_number')->get();
        $sum =  $reports->sum('amount');
        $count = $reports->count('id');
        session()->put('date_from', Carbon::parse(Clearance::orderBy('created_at', 'asc')->oldest('created_at')->first()->created_at)->format('Y-m-d')." 00:00:00");
        session()->put('date_to', Carbon::now()->format('Y-m-d')." 23:59:59");
        session()->put('count', $count);
        session()->put('reports', $reports);
        session()->put('sum', $sum);
        session()->put('captain', $captain);
        return view('admin.admins.reports', compact('reports'));
    }

    public function filter(GeneralSettings $settings, Request $request){
        

        $address = $request->address;
        $status = $request->status;
        $date_from = Carbon::parse($request->date_from)->format('Y-m-d')." 00:00:00";
        $date_to = Carbon::parse($request->date_to)->format('Y-m-d')." 23:59:59";
        $now = Carbon::now()->format('Y-m-d')." 23:59:59";
        $old = Carbon::parse(Clearance::orderBy('created_at', 'asc')->oldest('created_at')->first()->created_at)->format('Y-m-d')." 00:00:00";

        $query = Clearance::query();
        $query = $query->whereNotNull("control_number");
        if($request->date_from !== null && $request->date_to === null){
            $query = $query->whereBetween('created_at', [$date_from, $now]);
        }
        if($request->date_from !== null && $request->date_to !== null){
            $query = $query->whereBetween('created_at', [$date_from, $date_to]);
        }
        if($request->date_from === null && $request->date_to !== null){
            $query = $query->whereBetween('created_at', [$old, $date_to]);
        }
        if($request->address !== null){
            $query = $query->Where('business_address', 'like', '%' . $request->address . '%');
        }
        if($request->status === 'all'){
            $query = $query->where(function($query){
                $query->where('rejected_at', '=', NULL)
                ->orwhere('rejected_at', '!=', NULL);
            });
        }
        if($request->status === 'approved'){
            $query = $query->whereNull('rejected_at');
        }
        if($request->status === 'rejected'){
            $query = $query->whereNotNull('rejected_at');
        }
        if($request->type === 'all'){
            $query = $query->where(function($query){
                $query->where('clearance_id', '=', NULL)
                ->orwhere('clearance_id', '!=', NULL);
            });
        }
        if($request->type === 'new'){
            $query = $query->whereNull('clearance_id');
        }
        if($request->type === 'renew'){
            $query = $query->whereNotNull('clearance_id');
        }
        
        $reports = $query->get();

        $sum =  $reports->sum('amount');
        $count = $reports->count('id');
        session()->put('count', $count);
        session()->put('reports', $reports);
        session()->put('sum', $sum);
        session()->put('date_from', $date_from);
        session()->put('date_to', $date_to);
        
        return view('admin.admins.reports', compact("reports"));
    }

    public function exportPDF() {

        $pdf = PDF::loadView('admin.clearances.pdfReports', ['reports' => session('reports'), 'sum' => session('sum'), 'captain' => session('captain') , 'date_from' => session('date_from'), 'date_to' => session('date_to'), 'count' => session('count')]);
        return $pdf->setPaper('a4')->setOrientation('portrait')->setOption('margin-top', 5)->download('export' . '.pdf');
    
    }

}

// if($request->date_from === NULL || $request->date_to === NULL){
    //     $reports = Clearance::paginate(30);
    //     $sum = $reports->sum('amount');
    //     $count = $reports->count('id');
    //     session()->put('count', $count);
    //     session()->put('reports', $reports);
    //     session()->put('sum', $sum);
    //     return view('admin.admins.reports', compact('reports'));
    // }
    // else
    // {
    //     $reports = Clearance::whereBetween('created_at', [$date_from, $date_to])->paginate(30);
    //     $sum = $reports->sum('amount');
    //     $count = $reports->count('id');
    //     session()->put('count', $count);
    //     session()->put('reports', $reports);
    //     session()->put('sum', $sum);
    //     return view('admin.admins.reports', compact('reports'));
    // }