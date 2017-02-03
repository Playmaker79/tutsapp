@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1 class="text-center">Mentor verification</h1>
                <h3 class="alert alert-warning text-center">Your account is not yet verified!</h3>
                <div class="panel panel-primary">
                    <div class="panel-heading  text-center">Please Upload your <b>CV</b>
                        <p class="label label-warning">
                            Upload in PDF format
                        </p>
                    </div>

                    {{--cv upload form--}}
                    <form action="{{ route('postCV') }}" class="panel-body form-inline" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="col-md-8 col-md-offset-2">
                            <input type="file" class="form-control"  accept=".pdf" name="cv"/>
                            <input type="submit" class="form-control button btn btn-success"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
