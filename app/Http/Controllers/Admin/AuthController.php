<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login()
    {
        return view('admin.auth.login');
    }

    public function logout()
    {
        Auth::logout();
        return Response::redirectToRoute('admin.auth.login');
    }

    public function doLogin(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        /**
         * @var $user User
         */
        $user = User::role(['super_admin','admin'])->where('email',$request->input('email'))->first();

        if($user) {
            $authenicated = Hash::check($request->input('password'),$user->password);
            if($authenicated) {
                Auth::login($user, $request->has('remember'));
                $user->last_logged_in = Carbon::now();
                $user->save();
                return Response::redirectToIntended(route('admin.home'))->with('message', 'Welcome. '.$user->name);
            } else {
                throw ValidationException::withMessages([
                    'Credential Mismatch'
                ]);
            }
        } else {
            throw ValidationException::withMessages([
                'User does not exist'
            ]);
        }
    }
}
