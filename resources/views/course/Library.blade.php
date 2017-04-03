@extends('layouts.app')
<?php
function makeColor(){
    $color = '#';
    for($i=0;$i<6;$i++){
        $color .= mt_rand(0,9);
    }
    return $color;
}
?>
<style>
    .navbar{                                                                                                                        ``````````````````````````````````````````````````````````
        margin-bottom:0px !important;
        border-top: 0px;
    }
    #courseList{
        background-color: white !important;
    }

    #courseList .thumbnail{
        height:auto;
        width: 100%;
        max-width: 100%;
        min-height:400px;
    }

    #courseList img{
        height: 150px;
        margin:0px !important;
        min-width: 100%;
    }
    .clear{
        clear: both;
    }

    .btn-enroll{
        bottom:0px;
    }

    .btn-enroll{
        bottom: 30px;
        position: absolute;
        background-color: #d9534f;
        color:white;
    }

    #courseList .caption {
        padding-bottom: 10px !important;
    }
    .toastup{
        padding: 10px;
        color: white;
        position: absolute;
        right: 10px;
        top: 25%;
        border-radius: 10px;
        font-size: 15px;
        display:none;
        z-index: 99;
    }
    .toastup-error{
        background: rgba(255, 34, 12, 0.56);
    }
    .toastup-warn{
        background: rgba(252, 236, 82, 0.56);
    }
    .toastup-success{
        background: rgba(160, 222, 71, 0.56);
    }
</style>

<script src="/js/toastr.min.css"></script>
<script src="/js/toastr.min.js"></script>
@section('content')
    @if(Session::has('message'))
        <span class="toastup toastup-{{Session::get('type')}}">
                     <span class="toast-heading">
                         <span>
                             <b>{{Session::get('title')}}</b>
                         </span>
                     </span>
                    <hr>
                    {{Session::get('message')}}
                    </hr>
                </span>
    @endif
        <div class="container" id="courseList">
            <hr><h1 class="text-center">Course library</h1><hr>
            @foreach($courses as $course)
                <div class="col-md-4">
                    <div class="thumbnail">
                        {{--course image--}}
                        <img src="{{route('coverImage',['id'=>$course->cover])}}" alt="">
                        {{--course details--}}
                        <div class="caption">
                            <h3>{{$course->name}}</h3>
                            <p>{{$course->description}}</p>
                            <a href="{{route('enroll',['id'=>he($course->id)])}}" class="btn button pull-right clear btn-enroll center-block">Enroll</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    <script>
        $('document').ready(function () {
            $(".toastup").delay(1000).slideDown('fast').delay(3000).slideUp();
        });
    </script>
@endsection


