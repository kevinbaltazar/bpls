<?php

namespace App\Http\Controllers\applicant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Clearance;
use App\Models\Media;
use Session;

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
            'middle_name' => 'nullable',
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
        
        
        $request->validate([
            'cedula' => 'nullable',
            'identification_card' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10084',
            'real_property_tax' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10084',
            'land_title' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10084',
            'dti' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10084',
            'contract_of_lease' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10084',
        ]);

        $clearance = Clearance::create(session('first'));

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

        session()->forget('first');
        return redirect('/');
    }

    public function createRenewStep1()
    {
        return view('applicant/renew/first',[
            'renew' => session('renew', [])
        ]);
    }
    public function postCreateRenewStep1(Request $request, Clearance $clearance)
    {   
        $request->validate([
            'control_number' => 'required',
            'business_name' => 'required'
        ]);


        if($clearance = Clearance::where('control_number', $request->control_number)
        ->where('business_name', $request->business_name)
        ->first())
        {
            if($clearance->signed_at !== null)
            {
                session()->put('clearance', $clearance->id);
                return redirect('renew/second');
            }
            else
            {
                Session::flash('message', "you dont have business!");
                return Redirect()->back();
            }
            
        }
        else
        {
            Session::flash('message', "try again!");
            return Redirect()->back();
        }
    }

    public function createRenewStep2()
    {
        return view('applicant/renew/second');
    }

    public function postCreateRenewStep2(Request $request, Clearance $clearance)
    {

        $request->validate([
            'identification_card' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10084',
            'real_property_tax' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10084',
            'land_title' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10084',
            'dti' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10084',
            'contract_of_lease' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10084',
            'old_permit' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10084',
            'picture_of_business' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10084',
        ]);

        $clearance = Clearance::find(session('clearance'));

        $clearance->addMedia($request->file('identification_card'))->toMediaCollection('renew_requirements');
        $clearance->addMedia($request->file('real_property_tax'))->toMediaCollection('renew_requirements');
        $clearance->addMedia($request->file('land_title'))->toMediaCollection('renew_requirements');
        $clearance->addMedia($request->file('dti'))->toMediaCollection('renew_requirements');
        $clearance->addMedia($request->file('contract_of_lease'))->toMediaCollection('renew_requirements');
        $clearance->addMedia($request->file('old_permit'))->toMediaCollection('renew_requirements');
        $clearance->addMedia($request->file('picture_of_business'))->toMediaCollection('renew_requirements');
        $clearance->business_renew_at = now();
        $clearance->save();
        
        return redirect('/');
    }
}
