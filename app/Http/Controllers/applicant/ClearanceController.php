<?php

namespace App\Http\Controllers\applicant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Clearance;
use App\Models\Media;
use Nexmo\Laravel\Facade\Nexmo;
use App\Models\Business_type;

class ClearanceController extends Controller
{
    public function createStep1()
    {
        
        // session()->forget('first');
        $business_type = Business_type::orderBy('name')->get();
        return view('applicant.steps.step1', [
            'first' => session('first', []),
            'business_type' => $business_type,
        ]);

        
    }

    public function postCreateStep1(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'middle_name' => 'nullable',
            'last_name' => 'required',
            'personal_address' => 'required',
            'business_name' => 'required',
            'business_address' => 'required',
            'birthdate' => 'required',
            'birthplace' => 'required',
            'mobile_number' => 'required|min:10|max:10',
            'telephone_number' => 'nullable',
            'business_type' => 'required'
        ]);

        $validatedData['mobile_number'] = '63' . $request->mobile_number;


        // if(!$validatedData)
        // {
        //     return redirect()->back()->withInput()->withErrors(['msg', 'errors']);
        // }

        session()->put('first', $validatedData);

        return redirect('/application/second');
    }

    public function createStep2(Request $request){
        // return view('applicant.steps.step2', [
        //     'data' => session('second', []),
        // ]);
        return view('applicant.steps.step2');
        if(session('first') != null)
        {
            // $clearance = Clearance::find(1);
            // $image = $clearance->getMedia('requirements');
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
        
        
        $validatedCedula = $request->validate([
            'cedula_number' => 'required',  
        ]);
        
        $request->validate([
            'identification_card' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5084',
            'real_property_tax' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5084',
            'land_title' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5084',
            'dti' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5084',
            'contract_of_lease' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5084',
        ]);
        
        $merge = array_merge(session('first'), $validatedCedula);

        $clearance = Clearance::create($merge);
        
        $clearance->addMedia($request->file('identification_card'))->toMediaCollection('requirements');
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
        $clearance = Clearance::find(session('clearance'));
        $images = $clearance->getMedia('requirements');
        return view('applicant.steps.step3', compact('clearance','images'));
        
        // return view('applicant.steps.step3', [
        //     'clearance' => Clearance::find(session('clearance'))
        // ]);
       
    }

    public function postCreateStep3()
    {
        $clearance = Clearance::find(session('clearance'));

        $clearance->completed_at = now();
        $clearance->save();

        Nexmo::message()->send([
            'to'   => $clearance->mobile_number,
            'from' => 'Pulong Buhangin',
            'text' => "Your application was already submitted, please wait 3-5 working days to process your application. Thank you!"
        ]);

        session()->forget('first');
        return redirect('/');
    }
}
