<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserProfileController extends Controller
{
    /**
     * User profile page view
     */
    public function profilePage()
    {
        return view('frontend.body.profile');
    }

    /**
     * logout user
     */
    public function Logout()
    {
        Auth::logout();
        return redirect()->route('dashboard');
    }

    /**
     * update profile
     */
    public function updateProfile(Request $request)
    {
        $userData = User::find(Auth::user()->id);
        $userData['name'] = $request->name;
        $userData['email'] = $request->email;
        $userData['phone'] = $request->phone;
        $userData['updated_at'] = Carbon::now();

        $selctedImage = $request->file('image');

        if ($selctedImage) {
            $newImageName = hexdec(uniqid()) . '.' . strtolower($selctedImage->getClientOriginalExtension());
            $selctedImage->move('upload/user/', $newImageName);
            $userData['profile_photo_path'] = 'upload/user/' . $newImageName;
            if ($request->old_img) {
                unlink($request->old_img); // delete current image
            }
        }

        $userData->save();
        // add toaster message
        $notifiction = array(
            'message' => 'Profile Updated Succesfully',
            'alert-type' => 'success'
        );
        return Redirect::back()->with($notifiction);
    }

    /**
     * change password action
     */
    public function updatePassword(Request $request){
        $validateData = $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed'
        ]);

        $userData = User::find(Auth::user()->id);
        if(Hash::check($request->current_password, $userData['password'])){
             $userData['password'] = Hash::make($request->password);
             $userData->save();               
             $notifiction = array(
                'message' => 'Password Updated Succesfully',
                'alert-type' => 'warning'
            );
             return Redirect::route('user.logout')->with($notifiction);           
        }else{
            $notifiction = array(
                'message' => 'Invalid password',
                'alert-type' => 'error'
            );
            return Redirect::back()->with($notifiction);  
        }
    }

    /**
     * change password form
     */
    public function changePasswordPage(){
        return view('frontend.body.update_password');
    }
}
