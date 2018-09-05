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

    public function __construct()
    {
        $this->middleware('checkDemo');
    }
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
        if (env('APP_TYPE') != 'new'){
            return redirect('/')->with([
                'message'=> language_data('Invalid access'),
                'message_important' => true
            ]);
        }

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


            $timeZoneSetting = "\n" .
                'APP_TYPE=installed'.
                "\n";
            // @ignoreCodingStandard
            $env = file_get_contents(base_path('.env'));
            $rows = explode("\n", $env);
            $unwanted = "APP_TYPE";
            $cleanArray = preg_grep("/$unwanted/i", $rows, PREG_GREP_INVERT);

            $cleanString = implode("\n", $cleanArray);
            $env = $cleanString . $timeZoneSetting;

            try {
                file_put_contents(base_path('.env'), $env);
                
                return Reply::redirect(route('LaravelInstaller::final'), 'Application Installed Perfectly.');

            } catch (\Exception $e) {
                return Reply::error('Something went wrong. Please try again');
            }

        }else{
            return Reply::error('Something went wrong. Please try again');
        }

    }


}
