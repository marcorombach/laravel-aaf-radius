<?php
// config for Marcorombach/LaravelAafRadius
return [
    'server' => '', //IP of the Radius Server
    'secret' => '', //Radius secret
    'nasip' => '', //IP of the webserver (Radius Client)
    'post-login-route' => '', //Route to redirect to after login - if not set you will be redirected to the base URL
    'error-route' => '', //Route to redirect to on login error - redirects with $error variable set
];
