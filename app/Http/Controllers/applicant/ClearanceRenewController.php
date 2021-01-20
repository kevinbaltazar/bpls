<?php

namespace App\Http\Controllers\applicant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Clearance;

class ClearanceRenewController extends Controller
{
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
                $renew = [
                    'clearance_id' => $clearance->id,
                    'business_type' => $clearance->business_type,
                    'first_name' =>  $clearance->first_name,
                    'middle_name' =>  $clearance->middle_name,
                    'last_name' =>  $clearance->last_name,
                    'personal_address' =>  $clearance->personal_address,
                    'business_name' =>  $clearance->business_name,
                    'business_address' =>  $clearance->business_address,
                    'birthdate' =>  $clearance->birthdate,
                    'birthplace' =>  $clearance->birthplace,
                    'mobile_number' =>  $clearance->mobile_number,
                    'telephone_number' =>  $clearance->telephone_number,
                ];
                session()->put('clearance', $renew);
                return redirect('renew/second');
            }
            else
            {
                session()->flash('message', "you dont have business!");
                return Redirect()->back();
            }
            
        }
        else
        {
            session()->flash('message', "business name or control number is incorrect!");
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

        $clearance = Clearance::create(session('clearance'));
        
        $clearance->addMedia($request->file('identification_card'))->toMediaCollection('renew_requirements');
        $clearance->addMedia($request->file('real_property_tax'))->toMediaCollection('renew_requirements');
        $clearance->addMedia($request->file('land_title'))->toMediaCollection('renew_requirements');
        $clearance->addMedia($request->file('dti'))->toMediaCollection('renew_requirements');
        $clearance->addMedia($request->file('contract_of_lease'))->toMediaCollection('renew_requirements');
        $clearance->addMedia($request->file('old_permit'))->toMediaCollection('renew_requirements');
        $clearance->addMedia($request->file('picture_of_business'))->toMediaCollection('renew_requirements');
        $clearance->renew_completed_at = now();
        $clearance->save();
        
        return redirect('/');
    }
}
