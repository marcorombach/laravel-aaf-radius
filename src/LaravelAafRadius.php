<?php

namespace Marcorombach\LaravelAafRadius;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;

class LaravelAafRadius extends Controller
{
    use AuthorizesRequests, ValidatesRequests;
    const TIMEOUT = 45;

    public function __construct()
    {
        $this->middleware('web');
    }

    function authenticate($username, $password){

        $radius = new Radius();
        $radius->setServer(config('aaf-radius.server'))
            ->setSecret(config('aaf-radius.secret'))
            ->setNasIpAddress(config('aaf-radius.nasip'))
            ->setTimeout(self::TIMEOUT);

        // PAP Authentication
        $authenticated = $radius->accessRequest($username, $password);

        $user = $radius->getAttribute(1);

        if($authenticated){
            LoginHandler::handleLogin($user);

            if(config('aaf-radius.post-login-route') != ''){
                return redirect()->route(config('aaf-radius.post-login-route'));
            }
            return redirect(url('/'));

        }
        if(config('aaf-radius.error-route') != ''){
            return redirect()->route(config('aaf-radius.error-route'))->with(['error' => 'Authentication failed']);
        }
        return redirect(url('/'));
    }
}
