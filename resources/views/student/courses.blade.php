<style>
    .course_header h3, .course_header .button{
        display: inline-block;
    }
    
    .course_header .label{
        float: right;
        padding: 10px;
    }

    .btn-ongoing {
        background: rgba(160, 222, 71, 1);
        color: whitesmoke;
        margin:10px;
        text-shadow: 1px 1px 1px rgba(59, 16, 16, 0.24);
    }

    .btn-failed{
        background: rgb(222, 91, 0);
        color: whitesmoke;
        margin:10px;
        text-shadow: 1px 1px 1px rgba(59, 16, 16, 0.24);
    }

    .past-courses{
        background: #dddddd !important;
    }
</style>
@extends('layouts.app')
@section('content')
    <div class="container">
            @foreach($studentData->enrollment as $enrollment)
                @if($enrollment->status == 1)
                    <div class="row">
                        <h1 class="text-center">Current courses</h1>
                        <div class="col-md-10 col-md-offset-1 panel">
                            <div class="course_header">
                                <a href="{{route('viewCourse',['id'=>he($enrollment->course->id)])}}" role="button">
                                    <h3>{{ $enrollment->course->name}}</h3>
                                </a>
                                <span href="#" class="label btn-ongoing">Enrolled</span>
                            </div>
                            <hr>
                            <p>{{ $enrollment->course->description}}</p>
                        </div>
                    </div>
                @else
                <div class="row">
                    <h1 class="text-center">past courses</h1>
                    <div class="col-md-10 col-md-offset-1 panel past-courses">
                        <div class="course_header">
                            <h3>{{ $enrollment->course->name}}</h3>
                            <span href="#" class="label btn-failed">Failed</span>
                        </div>
                        <hr>
                        <p>{{ $enrollment->course->description}}</p>
                    </div>
                </div>
                @endif
            @endforeach
    </div>
@endsection
