<?php

Route::group(['middleware' => ('role:student'),'prefix' => 'student'], function () {

    /*Show mentors dashboard when logged in */
    Route::get('dashboard','student\studentController@showDashboard');

});
