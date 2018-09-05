<?php

namespace Shamim\LaravelInstaller\Controllers;

use Illuminate\Routing\Controller;

class WelcomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('checkDemo');
    }
    /**
     * Display the installer welcome page.
     *
     * @return \Illuminate\View\View
     */

    public function welcome()
    {

       if (env('APP_TYPE') != 'new'){
            return redirect('/')->with([
                'message'=> language_data('Invalid access'),
                'message_important' => true
            ]);
        }

        return view('vendor.installer.welcome');
    }

}
