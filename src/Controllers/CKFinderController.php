<?php

namespace Fourn\AdminCK\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Fourn\AdminCK\CKFinderMiddleware;
use Symfony\Component\HttpKernel\HttpKernelInterface;

class CKFinderController extends Controller
{

    public function __construct()
    {
        $authenticationMiddleware = config('ckfinder.authentication');

        // 在没有配置中间件的情况下使用默认的中间件（直接通过）
        if ($authenticationMiddleware) {
            $this->middleware($authenticationMiddleware);
        } else {
            $this->middleware(CKFinderMiddleware::class);
        }
    }

    public function requestAction(Request $request)
    {
        return app('CKConnector')->handle($request);
    }

    public function browserAction(Request $request)
    {
        return view('admin-ck::browser');
    }

}