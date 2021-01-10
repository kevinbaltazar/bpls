<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;


class GeneralSettingsController extends Controller
{
    public function showSettingPage()
    {
        return view('admin/admins/setting',  [
            'roles' => Role::all()
        ]);
    }
}


