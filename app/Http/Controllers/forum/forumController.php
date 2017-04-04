<?php

namespace App\Http\Controllers\forum;

use App\forumDiscussion;
use App\forumQuestion;
use App\question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class forumController extends Controller
{
    /*render the forum feed page*/
    public  function feed(){
        $feed = forumQuestion::with('user')->paginate(5);
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
        $question = forumQuestion::find($id);
        $replies = $question->discussion()->with('user')->get();
        return view('forum.discussion')
            ->with('question',$question)
            ->with('replies',$replies);
    }
    
    /*Handle a discussion reply message*/
    public  function postDiscussion($id,Request $request){
         $id = hd($id);
         $forumQuestion = forumQuestion::find($id);
         $discussion = new  forumDiscussion();
         $discussion->message = $request->reply;
         $discussion->question()->associate($forumQuestion);
         $discussion->user()->associate(Auth::user());
         $discussion->save();
         return redirect()->route('forumDiscussion',['id'=>he($id)]);
    }
}
