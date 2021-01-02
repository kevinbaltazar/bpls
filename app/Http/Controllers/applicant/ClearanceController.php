<?php

namespace App\Http\Controllers\applicant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Clearance;
use App\Models\Media;

class ClearanceController extends Controller
{
    public function createStep1()
    {
        return view('applicant.steps.step1', [
            'first' => session('first', []),
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
            'telephone_number' => 'nullable'
        ]);

        if(!$validatedData)
        {
            
            return redirect()->back()->withInput()->withErrors(['msg', 'errors']);
        }

        session()->put('first', $validatedData);

        return redirect('/application/second');
    }

    public function createStep2(Request $request){
        // return view('applicant.steps.step2', [
        //     'data' => session('second', []),
        // ]);
        
        if(session('first') != null)
        {
            return view('applicant.steps.step2');
        }
        else
        {
            session()->forget('first');
            return redirect('/application');
        }


        
    }

    public function postCreateStep2(Request $request)
    {
        
        
        $request->validate([
            'cedula' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'real_property_tax' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'land_title' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'dti' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'contract_of_lease' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $clearance = Clearance::create(session('first'));

        $clearance->addMedia($request->file('cedula'))->toMediaCollection('requirements');
        $clearance->addMedia($request->file('real_property_tax'))->toMediaCollection('requirements');
        $clearance->addMedia($request->file('land_title'))->toMediaCollection('requirements');
        $clearance->addMedia($request->file('dti'))->toMediaCollection('requirements');
        $clearance->addMedia($request->file('contract_of_lease'))->toMediaCollection('requirements');

        session()->put('clearance', $clearance->id);
        
        return redirect('/application/third');
    }

    public function createStep3(Request $request)
    {
        // $clearance = $request->session()->get('clearance');
        // return view('applicant.steps.step3',compact('clearance', $clearance));
        return view('applicant.steps.step3', [
            'clearance' => Clearance::find(session('clearance'))
        ]);
    }

    public function postCreateStep3()
    {
        $clearance = Clearance::find(session('clearance'));

        $clearance->completed_at = now();
        $clearance->save();

        session()->forget('first');
        return redirect('/');
    }
}
