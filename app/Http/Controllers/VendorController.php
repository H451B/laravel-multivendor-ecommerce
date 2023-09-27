<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorController extends Controller
{
    public function vendorDashboard()
    {
        return view('vendor.vendor_dashboard');
    }

    public function vendorProfile(){
        $id = Auth::user()->id;

        $vendorData = User::find($id);

        return view('vendor.vendor_profile',compact('vendorData'));
    }
}
