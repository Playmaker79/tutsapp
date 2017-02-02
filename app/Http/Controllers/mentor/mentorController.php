<?php

namespace App\Http\Controllers\mentor;

use App\chapter;
use App\course;
use App\cv;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\Array_;
use Symfony\Component\DomCrawler\Image;
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
                Auth::user()->status = 1;
                return redirect('/home');
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
        $course->cover = storeFile($request->cover,'cover');
        /*$request->cover->store('cover','public');*/
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
        $id = hd($course_id);
        $course = course::with('chapter')->get()->all();
        if(count($course)!=0){
            $course = course::with('chapter')->where('id',$id)->get()->first();
           /* return($course);*/
            return view('course.manage')->with('course',$course);
        }
    }

    /*create a new chapter*/
    public  function createChapter($id){
        $id = hd($id);
        $course = course::select('id','name')->where('id',$id)->get()->first();
        return view('course.newChapter')->with('course',$course);
    }

    /*handle a new chapter request*/
    public  function postChapter($id,Request $request){
        $id = hd($id);
        $course = course::findOrFail($id)->first();
        /*upload files to disk*/
        $video = storeFile($request->video_tutorial,'videos');
        $pdf = storeFile($request->pdfMaterial,'pdf');
        /*create a new chapter instance*/
        $chapter = new chapter();
        $chapter->name = $request->name;
        $chapter->notes = $request->notes;
        $chapter->video = $video;
        $chapter->pdf = $pdf;
        $chapter->course()->associate($course);
        /*dd($chapter);*/
        $chapter->save();
        return redirect()->route('courses');
    }

    public function coverImage($id){
        $cover = Storage::disk('cover')->get($id);
        $response = Response::make($cover, 200);
        $response->header('Content-Type', 'image/png');
        return $response;
    }

    /*serve  a specified chapters video tutorial*/
    public function serveVideo($id){
        $video = Storage::disk('videos')->get($id);
        $response = Response::make($video, 200);
        $response->header('Content-Type', 'video/mp4');
        return $response;
    }

    /*Preview a particular chapter*/
    public function previewChapter($course_id,$id){
        $id = hd($id);
        $course_id = hd($course_id);
        $chapter  = chapter::where('id',$id)->with('course')->where('course_id',$course_id)->first();
        return view('course.viewChapter')->with('chapter',$chapter);
    }

    /*preview pdf ebook */
    public function serveEbook($id){
        $ebook = Storage::disk('pdf')->get($id);
        $response = Response::make($ebook, 200);
        $response->header('Content-Type', 'application/pdf');
        return $response;
    }
}
