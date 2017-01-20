@extends('layouts.app')
<style>
#course_form{
    background: white;
    border: 0.5px solid #dfdfdf;
}
</style>
@section('content')
    <div class="container" id="course_form">
        <h1 class="text-center">Create a new course</h1>
        <hr>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                {{--course creation form--}}
                <form action="{{ route('postcourse') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                    {{ csrf_field() }}
                    {{--name of the course--}}
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>

                    {{--course description--}}
                    <div class="form-group">
                        <label for="name">Description</label>
                        <textarea name="description" id="description" cols="20" rows="10" class="form-control" required></textarea>
                    </div>

                    {{--course cover--}}
                    <div class="form-group">
                        <label for="name">cover image</label>
                        <input type="file" class="form-control" name="cover" id="cover" required>
                    </div>

                    {{--sumbit button--}}
                    <input type="submit" class="btn btn-primary " id="submit_btn" style="float: right" value="create course" required>
                </form>

                {{--Print the form validation errors--}}
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>

        </div>{{--end row--}}

        <hr>
        <br>@if(Session::has('message'))
            <?php $msg = json_decode(Session::get('message'))?>
            <br>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="alert alert-{{$msg->type}} alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <p class="text-center">
                            <span class="text-center">{{$msg->subject}}</span>
                            click
                            <a href="{{route('courses')}}"><strong>here</strong></a>
                            to add chapters</span>
                        </p>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <br>
@endsection
