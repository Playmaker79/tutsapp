<?php

/**
 * @param $collection
 * @return array
 */
/*helper methods used accross the project*/

/*
    * iterate through each item
    * Generate Hash ids and store them in  a temp variable($hashed_items)
   */
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
    return Hashids::decode($id);
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