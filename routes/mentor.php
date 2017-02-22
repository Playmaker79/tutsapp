<?php

Route::group(['prefix' => 'mentor'], function () {

    /*
     * Routes that are ignored from CV checking
     * New members should be able to upload CV
     * */
    Route::group(['middleware' =>('role:mentor')],function(){
        /* Show CV upload form */
        Route::get('uploadCV','mentor\mentorController@ShowCVupload')
            ->name('uploadCV');

        /* Route for handling the POST request of CV upload */
        Route::Post('uploadCV','mentor\mentorController@uploadCV')
            ->name('postCV');
    });


    /*
     * Routes that need account status checking
     * passed on only if CV is approved by admin
     * */
    Route::group(['middleware' =>[('role:mentor'),'Newmentor']],function(){
        /* Show mentors dashboard when logged in */
        Route::get('dashboard','mentor\mentorController@showDashboard')->name('mentorDash');


        /*Route for displaying course creation page*/
        Route::get('course','mentor\mentorController@createCourse')
            ->name('createCourse');

        /*Route for posting new course data*/
        Route::post('course','mentor\mentorController@postCourse')
            ->name('postcourse');

        /*Route for listing students */
        Route::get('students','mentor\mentorController@studentsList')
            ->name('students');

        /*Route for listing  courses */
        Route::get('courses','mentor\mentorController@Courses')
            ->name('courses');

        /*manage a course from the users course list */
        Route::get('courses/manage/{id}','mentor\mentorController@manageCourse')
            ->name('manageCourse');

        /*create a chapter for a course*/
        Route::get('course/{id}/chapter/','mentor\mentorController@createChapter')
            ->name('createChapter');

        /*create a chapter for a course*/
        Route::post('course/{id}/chapter/','mentor\mentorController@postChapter')
            ->name('postChapter');

        /*Delete a particular course*/
        Route::get('courses/{id}/delete', 'admin\adminController@deleteCourse')
            ->name('deleteCourse');

        /*preview a particular course */
        Route::get('course/{course_id}/chapter/{id}/preview',        'mentor\mentorController@previewChapter')
            ->name('previewChapter');

        /*preview a particular course */
        Route::get('chapter/{id}/quiz','mentor\mentorController@quizMaker')
            ->name('quizMaker');

        /*submit quiz */
        Route::post('chapter/{id}/quiz','mentor\mentorController@createQuiz')
            ->name('createQuiz');
    });

});

