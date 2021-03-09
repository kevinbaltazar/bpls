<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Clearance;
use Illuminate\Support\Carbon;

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

        $clearance = Clearance::whereNotNull('printed_at')->orWhereNotNull('renew_printed_at')->paginate(50);
        return view('admin/viewing/approved', compact('clearance'));
    }

    public function showreceived(Clearance $clearance){

        $clearance = Clearance::paginate(50);
        return view('admin/viewing/received', compact('clearance'));
    }

    public function showrejected(Clearance $clearance){

        $clearance = Clearance::whereNotNull('rejected_at')->orwhereNotNull('renew_rejected_at')->paginate(50);
        return view('admin/viewing/rejected', compact('clearance'));
    }

    public function showrenewed(Clearance $clearance){

        $clearance = Clearance::whereNotNull('renew_completed_at')->paginate(50);
        return view('admin/viewing/renewed', compact('clearance'));
    }
}
