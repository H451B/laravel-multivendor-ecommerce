<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    public function adminDashboard()
    {
        return view('admin.admin_dashboard');
    }//end method


    public function AdminLogin()
    {
        return view('admin.admin_login');
    }

    public function VendorLogin()
    {
        return view('vendor.vendor_login');
    }

    public function adminProfile()

    {
        $id = Auth::user()->id;

        $adminData = User::find($id);

        return view('admin.admin_profile',compact('adminData'));
    }


    public function adminDestroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }

    public function adminProfileStore(Request $request)
    {
        $id = Auth()->user()->id;
        $data = User::find($id);
        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        // Handle photo upload
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = time() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('upload/admin_images'), $photoName);
            $data->photo = $photoName;
        }

        $data->save();

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    public function AdminChangePassword()
   {
       return view('admin.admin_change_password');
   } //end method

    public function AdminUpdatePassword(Request $request){
        if($request->new_password!=$request->new_password_confirmation){
            return redirect()->back()->with('confirmerror','Doesn\'t Matched!!');
         }

         $request->validate([
             'old_password'=>'required',
             'new_password'=>'required|confirmed'
         ]);
         

         // Match The Old Password
        if (!Hash::check($request->old_password,auth::user()->password))
        {
            return redirect()->back()->with('error','Wrong Password!!');
        }
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return redirect()->back()->with('status','Password Changed Successfully!!');
        // return redirect()->back()->with('message','password Change Successfully');

    }//end method
}
