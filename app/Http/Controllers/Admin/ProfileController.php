<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('admin.profile',[
            'data' => $user,
            'title' => 'Profile',
            'breadcrumbs' => [
                ['label' => 'Profile', 'route_name' => 'admin.profile']
            ]
        ]);
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => [
                'required',
                function($attribute,$value,$fail) {
                    $user = User::find(Auth::user()->id);
                    if(!Hash::check($value,$user->password)) {
                        $fail('Incorrect Current Password');
                    }
                }
            ],
            'password' => 'required|confirmed'
        ]);

        $user = User::find(Auth::user()->id);
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return Redirect::back()->with('success', 'Password Changed Successfully');
    }
}
