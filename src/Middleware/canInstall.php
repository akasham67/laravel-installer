<?php

namespace Shamim\LaravelInstaller\Middleware;

use Closure;
use DB;

/**
 * Class canInstall
 * @package Froiden\LaravelInstaller\Middleware
 */

class canInstall
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if($this->alreadyInstalled()) {
            abort(404);
        }

        if (env('APP_STAGE') == 'Demo'){
            return redirect('admin')->with([
                'message' => 'Invalid Access',
                'message_important' => true
            ]);
        }
        
        return $next($request);
    }

    /**
     * If application is already installed.
     *
     * @return bool
     */
    public function alreadyInstalled()
    {
        return file_exists(storage_path('installed'));
    }

}
