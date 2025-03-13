<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\QuickRegistrationMail;
use App\Models\QuickRegistration;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;

class QuickRegistrationController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'tel' => 'required',
            'email' => 'required|email',
            'country' => 'required',
            'g-recaptcha-response' => [
                'required'
            ],
        ]);
        $res = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify',[
            'secret' => env('GOOGLE_RECAPTCHA_SECRET'),
            'response' => $request->input('g-recaptcha-response')
        ]);
        if($res->ok() && $res->json('success') === true) {
            $model = new QuickRegistration($request->only([
                'name', 'email', 'tel', 'country'
            ]));
            $model->save();
            try {
                Mail::to($model->email)
                    ->bcc([
                        'businessclient@just2canada.ca',
                        'info@tastechnologies.com',
                    ])
                    ->send(new QuickRegistrationMail($model));
            } catch (\Exception $e) {
                Log::debug($e->getMessage());
            }
        } else {
            Log::error('Google Recaptcha Failed for Quick registration form',[
                'request' => $request->toArray(),
                'google_response' => $res->json()
            ]);
            return Response::redirectToRoute('quick-registration-form')->with('error','Recaptcha failed. Try again');
        }
        return Response::redirectToRoute('quick-registration-form')->with('success','Your form save successfully. We will contact you soon');
    }

}
