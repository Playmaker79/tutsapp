<?php

Route::group(['middleware' => ('role:admin') ,'prefix' => 'admin'], function () {

    /*Show mentors dashboard when logged in */
    Route::get('dashboard','admin\adminController@showDashboard')
        ->name('adminDash');

    /*Show mentors dashboard when logged in */
    Route::get('cv/pending','admin\adminController@ReviewCV')
        ->name('ReviewCV');

    /*approve CV */
    Route::get('cv/{id}/approve','admin\adminController@approveCV')
        ->name('approveCV');

    /*disapprove CV */
    Route::get('cv/{id}/disapproveCV','admin\adminController@disapproveCV')
        ->name('disapproveCV');

    /*preview a cv in a pdf view*/
    Route::get('cv/preview/{id}','admin\adminController@CVpdfview')
        ->name('CVpdfview');

    /*List all students*/
    Route::get('students/all','admin\adminController@AllStudents')
        ->name('Allstudents');

    /*List all courses*/
    Route::get('courses/all','admin\adminController@Allcourses')
        ->name('Allcourses');

    /*Approve a particular course*/
    Route::get('courses/{id}/approve','admin\adminController@approveCourse')
        ->name('approveCourse');

    /*Disapprove a particular course*/
    Route::get('courses/{id}/disapprove','admin\adminController@disapproveCourse')
        ->name('disapproveCourse');
});


