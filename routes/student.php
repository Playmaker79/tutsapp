<?php

Route::group(['middleware' => ('role:student'),'prefix' => 'student'], function () {

    /*Show mentors dashboard when logged in */
    Route::get('dashboard','student\studentController@showDashboard');

    /*route to course library*/
    Route::get('course/library','student\studentController@courseLibrary')
        ->name('courseLibrary');

    /*route to course library*/
    Route::get('course/{id}/enroll','student\studentController@enroll')
        ->name('enroll');

    /*view a list of courses associated with the student */
    Route::get('courses','student\studentController@studentCourses')
        ->name('studentCourses');

    /*view a particular course*/
    Route::get('course/{id}','student\studentController@viewCourse')
        ->name('viewCourse')
        ->middleware('enrollmentCheck');

    /*Take a quiz*/
    Route::get('course/{id}/quiz','student\studentController@viewQuiz')
        ->name('viewQuiz');

    /*post quiz*/
    Route::post('course/{id}/quiz','student\studentController@postQuiz')
        ->name('postQuiz');
    
    /*preview a particular chapter */
    Route::get('course/{course_id}/chapter/{id}','student\studentController@viewChapter')
        ->name('viewChapter');
});
