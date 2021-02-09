<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clearance;
use Illuminate\Support\Carbon;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;


class ReportController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role:superadmin,admin']);
    }

    public function index(){
        
        $reports = Clearance::paginate(30);
        $sum =  $reports->sum('amount');
        return view('admin.admins.reports', compact('reports','sum'));
    }

    public function filter(Request $request){
        
        $date_from = Carbon::parse($request->date_from)->format('Y-m-d')." 00:00:00";
        $date_to = Carbon::parse($request->date_to)->format('Y-m-d')." 23:59:59";
        
        
        if($request->date_from === NULL || $request->date_to === NULL){
            $reports = Clearance::paginate(30);
            $sum = $reports->sum('amount');
            return view('admin.admins.reports', compact('reports','sum'));
        }
        else
        {
            $reports = Clearance::whereBetween('created_at', [$date_from, $date_to])->paginate(30);
            $sum = $reports->sum('amount');
            return view('admin.admins.reports', compact('reports','sum'));
        }
        
    }


}
