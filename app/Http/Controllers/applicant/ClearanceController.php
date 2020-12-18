<?php

namespace App\Http\Controllers\applicant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Clearance;

class ClearanceController extends Controller
{
    public function createStep1(Request $request){
        $clearance = $request->session()->get('clearance');
        return view('applicant.steps.step1',compact('clearance', $clearance));
    }

    public function postCreateStep1(Request $request){
        // $validatedData = $request->validate([
        //     'first_name' => 'required',
        //     'middle_name' => 'required',
        //     'last_name' => 'required',
        //     'personal_address' => 'required',
        //     'business_name' => 'required',
        //     'business_address' => 'required',
        //     'birthdate' => 'required',
        //     'birthplace' => 'required',
        //     'mobile_number' => 'required',
        // ]);

        // if(empty($request->session()->get('clearance'))){
        //     $clearance = new clearance();
        //     $clearance->fill($validatedData);
        //     $request->session()->put('clearance', $clearance);
        // }else{
        //     $clearance = $request->session()->get('clearance');
        //     $clearance->fill($validatedData);
        //     $request->session()->put('clearance', $clearance);
        // }

        return redirect('/application/create-step2');
    }

    public function createStep2(Request $request){
        $clearance = $request->session()->get('clearance');
        return view('applicant.steps.step2',compact('clearance', $clearance));
    }

    public function postCreateStep2(){
        return redirect('/application/create-step3');
    }

    public function createStep3(Request $request){
        $clearance = $request->session()->get('clearance');
        return view('applicant.steps.step3',compact('clearance', $clearance));
    }

    public function postCreateStep3(){
        
    }
}
