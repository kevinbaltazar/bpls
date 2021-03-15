<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Clearance;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance
     */
    public function __construct()
    {
        $this->middleware(['role:superadmin,admin']);
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(Clearance $clearance)
    {
        $received = $clearance::count('id');
        $processed = $clearance::whereNotNull('signed_at')->whereDate('signed_at', '>', Carbon::now()->subDays(30))->orWhereNotNull('renew_signed_at')->whereDate('renew_signed_at', '>', Carbon::now()->subDays(30))->count();
        $rejected = $clearance::whereNotNull('rejected_at')->whereDate('rejected_at', '>', Carbon::now()->subDays(30))->orWhereNotNull('renew_rejected_at')->whereDate('renew_rejected_at', '>', Carbon::now()->subDays(30))->count();
        $renew = $clearance::whereNotNull('renew_completed_at')->whereDate('renew_completed_at', '>', Carbon::now()->subDays(30))->count();
        $clearance = $clearance::paginate(15);
        return view('admin.dashboard', compact('processed', 'received', 'rejected', 'clearance', 'renew'));
    }
    
    public function showapproved(Clearance $clearance){

        return view('admin/viewing/approved', [
            'clearances' => Clearance::whereNotNull('printed_at')->orWhereNotNull('renew_printed_at')->paginate(6)->setPath ( '' ),
        ]);
    }

    public function showreceived(Clearance $clearance){

        return view('admin/viewing/received', [
            'clearances' => Clearance::paginate(6)->setPath ( '' ),
        ]);
    }

    public function showrejected(Clearance $clearance){

        
        return view('admin/viewing/rejected', [
            'clearances' => Clearance::whereNotNull('rejected_at')->orwhereNotNull('renew_rejected_at')->paginate(6)->setPath ( '' ),
        ]);
    }

    public function showrenewed(Clearance $clearance){

        return view('admin/viewing/renewed', [
            'clearances' => Clearance::whereNotNull('clearance_id')->paginate(6)->setPath ( '' ),
        ]);
    }

    public function search(Request $request){
        

        $query = Clearance::query($request->search);
        
        if($request->hidden == "approved"){
            if($request->search != Null){
                $query->where(function($query){
                    $query->whereNotNull('printed_at')
                    ->orwhereNotNull('renew_printed_at');
                });
                $clearances = $query->where('control_number', 'LIKE', '%' . $request->search . '%')->paginate(6)->setPath ( '' );
                return view('admin/viewing/approved', compact('clearances'));
            }
            else{
                return view('admin/viewing/approved', [
                    'clearances' => Clearance::whereNotNull('printed_at')->orWhereNotNull('renew_printed_at')->paginate(6)->setPath ( '' ),
                ]);
            }
        }
        if($request->hidden == "received"){
            if($request->search != Null){
                $clearances = $query->where('control_number', 'LIKE', '%' . $request->search . '%')->orWhere('business_name', 'LIKE', '%' . $request->search . '%')->paginate(6)->setPath ( '' );
                return view('admin/viewing/received', compact('clearances'));
            }
            else{
                return view('admin/viewing/received', [
                    'clearances' => Clearance::paginate(6)->setPath ( '' ),
                ]);
            }
        }
        if($request->hidden == "rejected"){
            if($request->search != Null){
                $clearances = $query->Where('business_name', 'LIKE', '%' . $request->search . '%')->paginate(6)->setPath ( '' );
                return view('admin/viewing/rejected', compact('clearances'));
            }
            else{
                return view('admin/viewing/rejected', [
                    'clearances' => Clearance::whereNotNull('rejected_at')->orwhereNotNull('renew_rejected_at')->paginate(6)->setPath ( '' ),
                ]);
            }
        }
        if($request->hidden == "renewed"){
            if($request->search != Null){
                $clearances = $query->whereNotNull('clearance_id')->where('control_number', 'LIKE', '%' . $request->search . '%')->orWhere('business_name', 'LIKE', '%' . $request->search . '%')->paginate(6)->setPath ( '' );
                return view('admin/viewing/renewed', compact('clearances'));
            }
            else{
                return view('admin/viewing/renewed', [
                    'clearances' => Clearance::whereNotNull('renew_completed_at')->paginate(6)->setPath ( '' ),
                ]);
            }
        }
    }
}
