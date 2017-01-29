@extends('layouts.app')
<style>
    .label-yellow{
        background: #581200;
        font-size:16px !important;
    }
</style>
@section('content')
    <div id="manage">
        <?php $count = 0  ?>
        <u><h1 class="text-center">{{$course->name}}</h1></u>
        <div class="col-md-8 col-md-offset-2" >
            <h3 class="text-center alert alert-info">Chapters</h3>
            @foreach($course->chapter as $chapter)
                <div class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <p class="label label-yellow"> Chapter{{$count+=1}}</p>
                            <h2 class="text-center">
                                {{$chapter->name}}
                            </h2>
                        </div>
                        <div class="panel-body">
                            <a href="#" class="button btn btn-primary pull-right">Edit</a>
                            <a href="#" class="button btn btn-danger pull-left">Delete</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection


