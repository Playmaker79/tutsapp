@extends('layouts.app')
@section('content')
<div class="panel">
    <div class="panel-heading">
        <hr>
        <h1 class="text-center">Discussion Forum</h1>
        <hr>
    </div>
</div>
<div class="panel container">
    <div class="panel-heading">
        <h3>{{$discussions->question}}</h3>
    </div>
</div>

<div id="reply-box" class="panel container">
    <form action="{{ route('postDiscussion',['id'=>$discussions->id]) }}" method="post">
        <div class="form-group">
            <label for="reply">leave a reply</label>
            <textarea name="reply" id="" cols="30" rows="5" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <input type="submit" value="submit" class="button btn btn-primary pull-right">
        </div>
        <br>
    </form>

</div>
</div>
@endsection
