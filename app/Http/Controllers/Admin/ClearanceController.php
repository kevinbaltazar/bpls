<?php

namespace App\Http\Controllers\Admin;

use App\Enums\ClearanceStatus;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Clearance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

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
            )
        ]);

        if ($request->new_status === ClearanceStatus::Rejected) {
            $clearance->reject();
        }

        if ($request->new_status === ClearanceStatus::Approved) {
            $clearance->approve($formData);
        }

        return redirect()->route('admin.clearances.index');
    }
}
