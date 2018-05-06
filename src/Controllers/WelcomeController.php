<?php

namespace ShamimS\LaravelInstaller\Controllers;

use Illuminate\Routing\Controller;

class WelcomeController extends Controller
{
    /**
     * Display the installer welcome page.
     *
     * @return \Illuminate\View\View
     */

    public function welcome()
    {

       if (env('DB_DATABASE')){
            return redirect('/')->with([
                'message'=> language_data('Invalid access'),
                'message_important' => true
            ]);
        }

        return view('vendor.installer.welcome');
    }

}
