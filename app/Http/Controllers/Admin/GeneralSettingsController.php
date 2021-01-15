<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Support\GeneralSettings;
use Illuminate\Http\Request;

class GeneralSettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:superadmin,admin']);
    }
    
    public function showSettingPage(GeneralSettings $settings)
    {
        return view('admin/admins/setting',  [
            'approvers' => Admin::role('approver')->get(),
            'settings' => $settings
        ]);
    }

    public function update(GeneralSettings $settings, Request $request)
    {
        $settings->secretary = $request->secretary;
        $settings->captain = $request->captain;
        
        $settings->save();
        
        return redirect()->back();
    }
    
}


