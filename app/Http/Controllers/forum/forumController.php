<?php

namespace App\Http\Controllers\forum;

use App\forumQuestion;
use App\question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class forumController extends Controller
{
    /*render the forum feed page*/
    public  function feed(){
        $feed = forumQuestion::where('user_id','>',1)->paginate();
        return view('forum.feed')->with('feeds',$feed);
    }

    /*handle the forum post*/
    public  function ask(Request $request)
    {
        $Question = new forumQuestion();
        $Question->question = $request->question;
        Auth::user()->forumQuestion()->save($Question);
        return redirect()
            ->route('forumDiscussion', ['id' => he($Question->id)]);
    }
    
    /*render a forum discussion view*/
    public function discussion($id){
        $id = hd($id);
        $discussion = forumQuestion::find($id);
        return view('forum.discussion')->with('discussions',$discussion);
    }
    
    /*Handle a discussion reply message*/
    public  function postDisussion($id,Request $request){
        $id = hd($id);
    }

}
