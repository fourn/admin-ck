<?php

Route::any('/ckfinder/connector', 'Fourn\AdminCK\Controllers\CKFinderController@requestAction')
    ->name('ckfinder-connector');

Route::any('/ckfinder/browser', 'Fourn\AdminCK\Controllers\CKFinderController@browserAction')
    ->name('ckfinder-browser');