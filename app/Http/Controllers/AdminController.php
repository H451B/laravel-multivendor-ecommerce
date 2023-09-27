<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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
}