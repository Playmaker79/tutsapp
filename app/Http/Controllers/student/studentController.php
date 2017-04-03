<?php

namespace App\Http\Controllers\student;

use App\chapter;
use App\course;
use App\enrollment;
use App\quiz;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class studentController extends Controller
{
    public function showDashboard()
    {
        $current_student = Auth::user();
        dd($current_student);
    }

    /*enroll a student to a particular course*/
    public function enroll($id)
    {
        $course_id = hd($id);
        if (Auth::user()->enrollment()->count() == 0) {
            $enrollment = Auth::user()->enrollment()->where('course_id', $course_id)->get()->count();
            if ($enrollment == 0) {
                $enrollment = new  enrollment();
                    $enrollment->student_id = Auth::user()->id;
                    $enrollment->course_id = $course_id;
                    $enrollment->status = 1;
                $enrollment->save();

                return redirect()->route('studentCourses')->with([
                    'title' => 'Enrollment success',
                    'message' => 'You have been enrolled to the course',
                    'type' => 'success',
                ]);
            } else {
                return redirect()->back()->with([
                    'title' => 'Enrollment failed',
                    'message' => 'You have already enrolled for this course',
                    'type' => 'warning',
                ]);
            }
        } else {
            return redirect()->back()->with([
                'title' => 'Enrollment failed',
                'message' => 'You have already enrolled for a course,Please complete that first!',
                'type' => 'error',
            ]);
        }
    }

    /*show course library */
    public function courseLibrary()
    {
        $courses = course::all();
        return view('course.library')->with('courses', $courses);
    }

    /*show current students enrollments*/
    public function showEnrollments()
    {

    }

    /*show the contents of the courses associated with the student */
    public function studentCourses()
    {
        $studentData = Auth::user()->load('enrollment.course');
        /*return $studentData;*/
        return view('student.courses')->with('studentData',$studentData);
    }

    /*view a particular course*/
    public function viewCourse($id){
        $id = hd($id);
        $course =  course::withCount('chapter')->with('chapter')->where('id',$id)->first();
        /*dd($course);*/
        return view('student.course')->with('course',$course);
    }


    /*view quiz*/
    public function viewQuiz($id){
        $id = hd($id);
        $quiz_data = chapter::find($id)->quiz->where('chapter_id',$id)->with('question')->first();
        return view('quiz.viewQuiz')->with('quiz_data',$quiz_data);
    }

    
    /*view Chapter by student*/
    public function  viewChapter($course_id,$id){
        $id = hd($id);
        $course_id = hd($course_id);
        $chapter  = chapter::where('id',$id)->with('course')->where('course_id',$course_id)->first();
        return view('course.viewChapter')->with('chapter',$chapter);
    }


    /*handle submitted quiz data*/
    /**
     * @param Request $request
     * @return mixed
     */
    public function postQuiz(Request $request){
        $score = null;
        $total = null;
        $quiz_data = $request->except('_token','chapter_id');
        $chapter_id = hd($request->chapter_id);
        $questions = chapter::find($chapter_id)->quiz->question()->get();
        /*
            Evaluate each question attended
            Check whether the answer is correct
        */
        foreach ($questions as $question){
            foreach ($quiz_data as $key => $value){
                if($question->id == hd($key)){
                    $total = $total+10;
                    if($question->answer == $value){
                        $score+=10;
                        $question->answerd = true;
                    }
                    else{
                        $question->answerd = false;
                    }
                }
            }
        }

        /*checking wether the score is above 80%*/
        if(($score/$total)*100 >= 80 ){
            $status ='passed';
        }
        else{
            $status = 'failed';
        }

        /*quiz results*/
        $results = [
            'total' => $total,
            'score' =>$score,
            'status'=>$status
        ];

        
        return view('quiz.review')->with(['questions'=>$questions,'results'=>collect($results)]);
    }

}

