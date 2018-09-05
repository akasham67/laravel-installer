<?php

namespace Shamim\LaravelInstaller\Controllers;

use App\Http\Requests;
use Illuminate\Routing\Controller;
use Shamim\LaravelInstaller\Helpers\PermissionsChecker;

class PermissionsController extends Controller
{

    /**
     * @var PermissionsChecker
     */
    protected $permissions;

    /**
     * @param PermissionsChecker $checker
     */
    public function __construct(PermissionsChecker $checker)
    {
        $this->permissions = $checker;
        $this->middleware('checkDemo');
    }

    /**
     * Display the permissions check page.
     *
     * @return \Illuminate\View\View
     */
    public function permissions()
    {
        if (env('APP_TYPE') != 'new'){
            return redirect('/')->with([
                'message'=> language_data('Invalid access'),
                'message_important' => true
            ]);
        }

        $permissions = $this->permissions->check(
            config('installer.permissions')
        );

        return view('vendor.installer.permissions', compact('permissions'));
    }
}
