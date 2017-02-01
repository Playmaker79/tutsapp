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
    .navbar{
        margin-bottom:0px !important;
        border-top: 0px;
    }
    .label-yellow{
        background: #581200;
        font-size:16px !important;
    }
    .cover{
        padding:100px;
       /* background: {{--{{route('coverImage',['id'=>$course->id])}};--}}*/
        background-color: #ffffff;
        margin-bottom:20px;
    }

    .chapter{
        background: linear-gradient(rgba(19, 17, 146, 0),rgba(210, 210, 210, 0.49));
        margin: 20px 0px;
        color:#101010;
        cursor: pointer;
        border:0px !important;
    }

    #manage{
        background: white !important;
    }

    .btn-red{
        background: #e53061;
        color:white;
    }
</style>
@section('content')
            <?php $count = 0  ?>
            <?php $id= he($course->id)?>
            <div class="cover">
                <h1 class="text-center">{{$course->name}}</h1>
            </div>

            <div class="container" id="manage">
                 <div class="col-md-8 col-md-offset-2" >
                <hr>
                <h3 class="text-center ">Chapters</h3>
                <hr>
                <a  href="{{ route('createChapter',['id'=>$id]) }}"
                    class="center-block button btn-red btn ">Add new chapter</a>
                <div class="panel-group">
                    @foreach($course->chapter as $chapter)
                        <div class="panel panel-default chapter">
                            <p class="label label-yellow"> Chapter{{$count+=1}}</p>
                            <h2 class="text-center">
                                {{$chapter->name}}
                            </h2>
                            <div class="panel-body">
                                <a href="#" class="button btn btn-primary pull-right">Edit</a>
                                <a href="#" class="button btn btn-danger pull-left">Delete</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            </div>
@endsection


