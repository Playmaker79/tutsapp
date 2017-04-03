<?php

Route::group(['middleware' => ('role:user') ,'prefix' => 'forum'], function () {

    /*display the discussion view of a particular question*/
    Route::get('discussion/{id}/','forum\forumController@discussion')
        ->name('forumDiscussion');

    /*display forum feed to all users*/
    Route::get('/','forum\forumController@feed')
        ->name('forumFeed');

    /*display forum feed to all users*/
    Route::post('/ask','forum\forumController@ask')
        ->name('forumAsk');

    /*post the forum discussion reply message*/
    Route::post('discussion/{id}/','forum\forumController@PostDiscussion')
        ->name('postDiscussion');
});


