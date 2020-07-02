<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SettingController extends Controller
{

    public function index()
    {
        return view('admin\setting\settings')->with('setting' , Setting::first());
    }


    public function update()
    {

        

        $this->validate(request() , [
            'site_name' => 'required',
            'address' => 'required',
            'contact_number' => 'required',
            'contact_email' => 'required|email'
        ]);
        $setting = Setting::first();
        $setting->site_name = request()->site_name;
        $setting->address = request()->address;
        $setting->contact_number = request()->contact_number;
        $setting->contact_email = request()->contact_email;

        $setting->save();

        Session::flash('success' , 'the settings updated');

        return redirect()->back();
    }
}
