<?php

namespace Marcorombach\LaravelAafRadius;

use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class LoginHandler
{
    static function handleLogin($username)
    {
        $user = new User();
        if(!in_array('username', \Schema::getColumnListing($user->getTable()))){
            throw new \ErrorException('User Table is not compatible. No username field.');
        }

        $user = User::where('username', $username)->first();

        if(!$user) {
            Log::info("AAF-RADIUS: Creating User");
            $user = new User();
            $table = $user->getTable();
            $columns = \Schema::getColumnListing($table);

            if (in_array('username', $columns)) {
                $user->username = $username;
            }
            if (in_array('password', $columns)) {
                $user->password = Str::random(32);
            }

            $user->save();
        }
        Log::info("AAF-RADIUS: Logging In");
        Auth::login($user);

        Log::info("AAF-RADIUS: Session - " . session()->all());

        if(Auth::check()){
            return true;
        }else{
            return false;
        }
    }
}
