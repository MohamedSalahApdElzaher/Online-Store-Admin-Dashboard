<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AdminProfileController extends Controller
{
    /**
     * return profile page
     */
    public function profile()
    {
        $adminData = Admin::find(1);
        return view('admin.body.profile', compact('adminData'));
    }

    /**
     * return view of profile Edit page and pass data to view
     */
    public function profileEdit()
    {
        $adminEditData = Admin::find(1);
        return view('admin.body.edit_profile', compact('adminEditData'));
    }

    /**
     * profile update action
     * get specific admin data | update it
     */
    public function profileUpdate(Request $request)
    {
        $adminData = Admin::find(1);
        $adminData['name'] = $request->name;
        $adminData['email'] = $request->email;
        $adminData['updated_at'] = Carbon::now();

        $selctedImage = $request->file('image');
        if ($selctedImage) {
            $newImageName = hexdec(uniqid()) . '.' . strtolower($selctedImage->getClientOriginalExtension());
            $selctedImage->move('upload/admin/', $newImageName);
            $adminData['profile_photo_path'] = 'upload/admin/' . $newImageName;
            unlink($request->old_img); // delete current image
        }
        $adminData->save();
        // add toaster message
        $notifiction = array(
            'message' => 'Profile Updated Succesfully',
            'alert-type' => 'success'
        );
        return Redirect::back()->with($notifiction);
    }

    /**
     * change password view page
     */
    public function changePassword(){
      return view('admin.body.change_password') ;
    }

    /**
     * update password
     */
    public function UpdatePassword(Request $request){
       
        $validateData = $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|confirmed'
        ]);

        $hashedPassword = Admin::find(1)->password;
        if(Hash::check($request->current_password, $hashedPassword)){
             $adminData = Admin::find(1);
             $adminData->password = Hash::make($request->new_password);
             $adminData->save();
             Auth::logout();            
             return redirect()->route('admin.logout');           
        }else{
            return Redirect::back();  
        }
    }
}
