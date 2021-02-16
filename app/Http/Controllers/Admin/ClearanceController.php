<?php

namespace App\Http\Controllers\Admin;

use App\Enums\ClearanceStatus;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Clearance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Nexmo\Laravel\Facade\Nexmo;

class ClearanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = Auth::guard('admin')->user();

        return view('admin.clearances.index', [
            'clearances' => Clearance::manageable($admin->role)->get()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clearance  $clearance
     * @return \Illuminate\Http\Response
     */
    public function show(Clearance $clearance)
    {
        return view('admin.clearances.show', [
            'clearance' => $clearance,
            'inspectors' => Admin::role('inspector')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clearance $clearance)
    {
        
        $formData = $this->validate($request, [
            'inspector' => Rule::requiredIf(
                $clearance->status === ClearanceStatus::Pending &&
                    $request->new_status === ClearanceStatus::Approved
            ),      
        ]);      
        

        if($request->new_status === ClearanceStatus::Approved){
            $clearance->update(['inspector_comment' => $request->inspector_comment]);
        }

        if ($request->new_status === ClearanceStatus::Rejected) {
            
            $msg = "Your application was rejected.\n\nReason: ";

            // Nexmo::message()->send([
            //     'to'   => $clearance->mobile_number,
            //     'from' => 'Pulong Buhangin',
            //     'text' => $msg . $request->rejected_message 
            // ]);
            
            $clearance->reject();
            $clearance->rejected_message = $request->rejected_message;
            $clearance->save();  
        }

        if ($request->new_status === ClearanceStatus::Approved) {
            $clearance->approve($formData,);
        }

        return redirect()->route('admin.clearances.index');
    }
}
