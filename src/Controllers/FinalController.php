<?php

namespace Shamim\LaravelInstaller\Controllers;

use App\Admin;
use App\AppConfig;
use Shamim\LaravelInstaller\Helpers\Reply;
use Shamim\LaravelInstaller\Request\SetupRequest;
use Illuminate\Routing\Controller;
use Shamim\LaravelInstaller\Helpers\InstalledFileManager;

class FinalController extends Controller
{
    /**
     * Update installed file and display finished view.
     *
     * @param InstalledFileManager $fileManager
     * @return \Illuminate\View\View
     */
    public function finish(InstalledFileManager $fileManager)
    {
        $fileManager->update();

        return view('vendor.installer.finished');
    }

    public function setup(InstalledFileManager $fileManager){

        $fileManager->update();

        return view('vendor.installer.setup');
    }


    public function save(SetupRequest $request)
    {
        $message = Admin::where('username','admin')->update([
            'password' => bcrypt($request->password)
        ]);

        if ($message){

            AppConfig::where('setting','Email')->update([
                'value' => $request->system_email
            ]);

            Admin::where('username','admin')->update([
                'email' => $request->system_email
            ]);

            return Reply::redirect(route('LaravelInstaller::final'), 'Application Installed Perfectly.');

        }else{
            return Reply::error('Something went wrong. Please try again');
        }

    }


}
