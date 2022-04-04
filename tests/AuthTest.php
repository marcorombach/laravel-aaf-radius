<?php

use Marcorombach\LaravelAafRadius\LaravelAafRadius;

test('can login', function () {
    $login = new LaravelAafRadius();
    if ($login->authenticate(config('aaf-radius.testuser'), config('aaf-radius.testpassword'))) {
        $this->assertTrue(true);
    } else {
        $this->assertTrue(false);
    }
    if ($login->getUser()->username == config('aaf-radius.testuser')) {
        $this->assertTrue(true);
    } else {
        $this->assertTrue(false);
    }
});

