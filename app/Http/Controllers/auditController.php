<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clearance;
use Spatie\Permission\Models\Role;
use App\Models\Admin;
use Carbon\Carbon;

class auditController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:superadmin,admin']);
    }

    public function index(){

        $audit = Clearance::all();

        return view('admin.clearances.audit',[
            'audits' => $audit,
            'activity' => 'all',
        ]);

        
    }

    public function filter(Request $request){
        $date_from = Carbon::parse($request->date_from)->format('Y-m-d')." 00:00:00";
        $date_to = Carbon::parse($request->date_to)->format('Y-m-d')." 23:59:59";
        $now = Carbon::now()->format('Y-m-d')." 23:59:59";
        $old = Carbon::parse(Clearance::orderBy('created_at', 'asc')->oldest('created_at')->first()->created_at ?? Carbon::now())->format('Y-m-d')." 00:00:00";

        $query = Clearance::query();
        $activity = $request->activity ?? 'all';

        if($request->activity === 'all'){
            if($request->date_from !== null && $request->date_to === null){
                $query->whereBetween('created_at', [$date_from, $now]);
            }
            if($request->date_from !== null && $request->date_to !== null){
                $query->whereBetween('created_at', [$date_from, $date_to]);
            }
            if($request->date_from === null && $request->date_to !== null){
                $query->whereBetween('created_at', [$old, $date_to]);
            }
            if($request->date_from === null && $request->date_to === null){
                $query->whereBetween('created_at', [$old, $now]);
            }
            $audit = $query->get();

        }
        if($request->activity === 'approved'){
            if($request->date_from !== null && $request->date_to === null){
                $query->whereBetween('signed_at', [$date_from, $now]);
            }
            if($request->date_from !== null && $request->date_to !== null){
                $query->whereBetween('signed_at', [$date_from, $date_to]);
            }
            if($request->date_from === null && $request->date_to !== null){
                $query->whereBetween('signed_at', [$old, $date_to]);
            }
            if($request->date_from === null && $request->date_to === null){
                $query->whereBetween('signed_at', [$old, $now]);
            }
            $audit = $query->whereNull('rejected_by')->get();
        }
        if($request->activity === 'reject'){
            if($request->date_from !== null && $request->date_to === null){
                $query->whereBetween('rejected_at', [$date_from, $now]);
            }
            if($request->date_from !== null && $request->date_to !== null){
                $query->whereBetween('rejected_at', [$date_from, $date_to]);
            }
            if($request->date_from === null && $request->date_to !== null){
                $query->whereBetween('rejected_at', [$old, $date_to]);
            }
            if($request->date_from === null && $request->date_to === null){
                $query->whereBetween('rejected_at', [$old, $now]);
            }
            $audit = $query->get();
        }
        if($request->activity === 'inspected'){
            if($request->date_from !== null && $request->date_to === null){
                $query->whereBetween('inspected_at', [$date_from, $now]);
            }
            if($request->date_from !== null && $request->date_to !== null){
                $query->whereBetween('inspected_at', [$date_from, $date_to]);
            }
            if($request->date_from === null && $request->date_to !== null){
                $query->whereBetween('inspected_at', [$old, $date_to]);
            }
            if($request->date_from === null && $request->date_to === null){
                $query->whereBetween('inspected_at', [$old, $now]);
            }
            $audit = $query->whereNull('rejected_by')->get();
        }
        if($request->activity === 'reviewed'){
            if($request->date_from !== null && $request->date_to === null){
                $query->whereBetween('requirements_approved_at', [$date_from, $now]);
            }
            if($request->date_from !== null && $request->date_to !== null){
                $query->whereBetween('requirements_approved_at', [$date_from, $date_to]);
            }
            if($request->date_from === null && $request->date_to !== null){
                $query->whereBetween('requirements_approved_at', [$old, $date_to]);
            }
            if($request->date_from === null && $request->date_to === null){
                $query->whereBetween('requirements_approved_at', [$old, $now]);
            }
            $audit = $query->whereNull('rejected_by')->get();
        }

       

        return view('admin.clearances.audit',[
            'audits' => $audit,
            'activity' => $activity,
        ]);
    }
}
