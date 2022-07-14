<?php
Route::group(['middleware' => ['web']], function () {
    Route::post('radius-login', [\Marcorombach\LaravelAafRadius\LaravelAafRadius::class, 'login']);
});

