<?php

namespace Shamim\LaravelInstaller\Controllers;

use Illuminate\Routing\Controller;
use Shamim\LaravelInstaller\Helpers\RequirementsChecker;

class RequirementsController extends Controller
{

    /**
     * @var RequirementsChecker
     */
    protected $requirements;

    /**
     * @param RequirementsChecker $checker
     */
    public function __construct(RequirementsChecker $checker)
    {
        $this->requirements = $checker;
        $this->middleware('checkDemo');
    }

    /**
     * Display the requirements page.
     *
     * @return \Illuminate\View\View
     */
    public function requirements()
    {
        $requirements = $this->requirements->check(
            config('installer.requirements')
        );

        return view('vendor.installer.requirements', compact('requirements'));
    }
}
