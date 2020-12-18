<?php

namespace App\Http\Controllers\applicant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Clearance;

class ClearanceController extends Controller
{
    public function createStep1()
    {
        return view('applicant.steps.step1', [
            'data' => session('first', []),
        ]);
    }

    public function postCreateStep1(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'personal_address' => 'required',
            'business_name' => 'required',
            'business_address' => 'required',
            'birthdate' => 'required',
            'birthplace' => 'required',
            'mobile_number' => 'required',
        ]);

        session()->put('first', $validatedData);

        return redirect('/application/second');
    }

    public function createStep2(Request $request){
        return view('applicant.steps.step2', [
            'data' => session('second', []),
        ]);
    }

    public function postCreateStep2(){
        // session()->put('second', $validatedData);
        return redirect('/application/third');
    }

    public function createStep3(Request $request){
        $clearance = $request->session()->get('clearance');
        return view('applicant.steps.step3',compact('clearance', $clearance));
    }

    public function postCreateStep3(){
        return "wow";
    }
}
