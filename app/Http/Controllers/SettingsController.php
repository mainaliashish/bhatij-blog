<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SettingsController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		return view('vatiz-back.settings.setting')->with('setting', Setting::first());
	}

    public function update(Request $request)
    {
    	// dd($request);
    	$image = $request->file('image');

    	$this->validate($request, [
    		'site_name'		=> 'required|max:40',
    		'address'		=> 'required|max:50',
    		'contact_number'=> 'required|max:40',
            'contact_email' => 'required|email',
            'about'         => 'required|max:3500',
    	]);

        if($image) {
            $image = $request->image->store('setting');
        }

    	$setting = Setting::first();
    	$setting -> site_name = $request->site_name;
        $setting -> address = $request->address;
        $setting -> about = $request->about;
    	$setting -> contact_number = $request->contact_number;
        $setting -> contact_email = $request->contact_email;
        $setting -> facebook = $request->facebook;
        $setting -> instagram = $request->instagram;
    	$setting -> image = isset($image) ? $image : $setting->image;

    	$result = $setting->save();

        if($result) {
            Session::flash('success', 'Blog Settings updated Successfully!');
        } else {
            Session::flash('error', 'Something went wrong.');
        }

        return redirect() -> route('settings.index');
    }

    public function password()
    {
    	return view('vatiz-back.settings.changepassword');
    }

    public function updatepassword(Request $request)
    {
        $this -> validate($request, [
        	'new-password_confirmation' => 'required',
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
       ]);

        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
        	session()->flash("error","Your current password does not matches with the password you provided. Please try again.");
            return redirect()->back();
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
        	session()->flash("error","New Password cannot be same as your current password. Please choose a different password.");
            return redirect()->back();
        }

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        session()->flash("success","Password changed successfully");
        return redirect()->back();
    }
}
