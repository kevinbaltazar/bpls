<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactUs;

class ContactUsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:superadmin,admin']);
    }
    
    public function insert(Request $request){
        $data = $request->validate([
            'full_name' => 'required', 
            'email' => 'required',  
            'contact_number' => 'required',  
            'message' => 'required',   
        ]);
        
        ContactUs::create($data);
        
        return redirect('ContactUs');
    }

    public function show(){


        $messages = ContactUs::all();

        return view("admin/admins/messages", compact('messages'));
    }
}
