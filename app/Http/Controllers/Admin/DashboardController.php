<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        return view('admin.dashboard');
    }
}
