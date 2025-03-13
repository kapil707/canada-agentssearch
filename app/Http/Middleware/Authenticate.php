<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {

            $segments = $request->segments();
            // dd($segments);
            if(in_array('admin',$segments)) {
                return route('admin.auth.login');
            }
            if(in_array('employer',$segments)) {
                return route('employer.login');
            }

            if(in_array('business-immigration-assessment',$segments)) {
                return route('business-immigration.init');
            }

            return route('login');
        }
    }
}
