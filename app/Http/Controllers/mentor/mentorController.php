<?php

namespace App\Http\Controllers\mentor;

use App\course;
use App\cv;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\Types\Array_;
use Vinkla\Hashids\Facades\Hashids;

class mentorController extends Controller
{

    /*show mentors dashboard*/
    public function showDashboard()
    {
        $current_mentor = Auth::user();
        dd($current_mentor);
    }


    /*show mentors CV upload area */
    public function showCVupload(){
        return view('mentor.CVupload');
    }


    /*Upload CV from the POST request to the db */
    public function uploadCV(Request $request){
        if($request->file('cv')->isValid() &&  $request->hasFile('cv')){
            if($extension = $request->cv->extension() == 'pdf'){
                $path = $request->cv->store('/','cv');
                $cv = new cv();
                $cv->path = $path;
                Auth::user()->cv()->save($cv);
            }
            else{
                 return "<h1>The CV must be in PDF format. please upload again ".
                 "<a href='/mentor/uploadCV'>".
                 " Go back".
                 "</a></h1>";
            }
        }

    }


    /*render course creation page*/
    public  function createCourse(){
        return view('mentor.course');
    }

    /*Handle course creation post request */
    /**
     * @param Request $request
     */
    public function postCourse(Request $request){

        /*form validation rules */
        $this->validate($request, [
            'name' => 'required|max:100',
            'description' => 'required|max:255',
            'cover' =>'required|image|file|max:2048'
        ]);
        
        /*creating a new course instance */
        $course = new course();
        $course->name = $request->name;
        $course->description = $request->description;
        $request->cover->store('cover','public');
        $course->cover = $request->cover->hashName();
        Auth::user()->course()->save($course);
        $message = Array(
            "subject"=>"Course created!",
            "type"=>"success"
        );
        return redirect()->back()->with('message',json_encode($message));
    }

    /*show courses list view */
    public function  courses(){
        $courses = Auth::user()->course()->get();

        /*render course list page*/
        return view('mentor.courses')->with('courses',$courses);
    }

    /*delete a particular course*/
    public  function  deleteCourse($course_id){
        $course_id = hd($course_id);
        $course = Auth::user()->course()->find($course_id);
       if(count($course)!=0){
          course::destroy($course_id);
           return redirect()->route('courses')->with([
                'message' =>true,
                'type' =>'success',
                'subject'=>'Course deleted'
           ]);
       }
       else{
          return redirect()->route('courses')->withErrors(['perm_error','You dont have  permission to delete that course']);
       }
    }

    /*Manage a course */
    public  function manageCourse($course_id){
        $course_id = hd($course_id);
        $course = Auth::user()->course()->find($course_id);
        if(count($course)!=0){
            return view('course.chapter');
        }
    }
}
