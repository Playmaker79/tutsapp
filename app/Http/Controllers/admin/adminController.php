<?php

namespace App\Http\Controllers\admin;
use App\course;
use App\cv;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class adminController extends Controller
{
    /*show admins dashboard*/
    public function showDashboard(){
     /*show admins dashboard */
    }

    /*Show cv's that admin needs to review*/
    public function ReviewCV(){
        $cvs =  cv::with('user')->get();
        return view('admin.ReviewCV')->with('cvs',$cvs);
    }

    /*Approve cv */
    public function approveCV($cv_id){
        $id = hd($cv_id);
        $cv = cv::with('user')->where('id',$id)->get()->first();
        $cv->user->status = 1;
        $cv->user->save();
        return redirect()->route('ReviewCV');
    }

    /*Disapprove cv*/
    public function disapproveCV($cv_id){
        $id = hd($cv_id);
        $cv = cv::with('user')->where('id',$id)->get()->first();
        $cv->user->status = 2;
        $cv->user->save();
        return redirect()->route('ReviewCV');
    }

    /*load cv for preview*/
    public function CVpdfview($path){
        $pdf = Storage::disk('cv')->get($path);
        /*render pdf in browser */
        $response = Response::make($pdf, 200);
        $response->header('Content-Type', 'application/pdf');
        return $response;
    }

    /*List all courses */
    public  function  AllCourses(){
        $courses = course::with('user')->get()->all();
        return view('admin.Allcourses')->with('courses',$courses);
    }

    /*list all students*/
    public  function  AllStudents(){
        return view('admin.Allstudents')->with('students',User::where('type','student')->get());
    }

    /*block a user*/
    public function blockUser($id){
        $id = hd($id);
        $user = User::where('id',$id)->get()->first();
            $user->status = 2;
            $user->save();
        return redirect()->back();
    }

    /*unblock user*/
    public function unblockUser($id){
        $id = hd($id);
        $user = User::where('id',$id)->get()->first();
            $user->status = 1;
            $user->save();
        return redirect()->back();
    }

    /*block course*/
    public function approveCourse($id){
        $id = hd($id);
        $course = course::where('id',$id)->get()->first();
        $course->status = 1;
        $course->save();
        return redirect()->back();
    }

    /*unblock course*/
    public function disapproveCourse($id){
        $id = hd($id);
        $course = course::where('id',$id)->get()->first();
        $course->status = 2;
        $course->save();
        return redirect()->back();
    }

    
    /*delete a course*/
    public function deleteCourse($id){
        $id = hd($id);
        course::destroy($id);
        return redirect()->back();
    }
}
