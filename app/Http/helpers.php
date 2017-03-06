<?php

/*helper methods used accross the project*/

/*
    * iterate through each item
    * Generate Hash ids and store them in  a temp variable($hashed_items)
   */
use Storage as Storage;
function hashMake($collection)
{
    $collection = $collection->toArray();
    $hashed_items = [];

    foreach ($collection as $item) {
        $item['id'] = Hashids::encode($item['id']);
        array_push($hashed_items, $item);
    }
    return collect($hashed_items);
}

/*encode a given integer to hashids*/
function he($id)
{
    return Hashids::encode($id);
}

/*decode a given string to hashids*/
function hd($id){
    return Hashids::decode($id)[0];
}



/*check whether user is mentor*/
function isMentor(){
    if(Auth::user()->type == "mentor"){
        return true;
    }
    else{
        false;
    }
}

/*check whether user is admin*/
function isAdmin(){
    if(Auth::user()->type == "admin"){
        return true;
    }
    else{
        false;
    }
}


/*check whether user is student*/
function isStudent(){
    if(Auth::user()->type == "student"){
        return true;
    }
    else{
        false;
    }
}


/*generate a unique filename for uploads*/
/**
 * @param $file
 * @return string
 */
function makeFilename($file){
 $filename = time().str_random(10).'.'.$file->getClientOriginalExtension();
    return $filename;
}


/**
 * @param $file
 * @param $disk
 * @return string
 */
function storeFile($file, $disk){
    $filename = makeFilename($file);
    $file->storeAs('/',$filename,$disk);
    return $filename;
}


/*check whether the given item is empty*/

function nothing($item){
    if(sizeof($item) == 0){
        return true;
    }
    else{
        return false;
    }
}

