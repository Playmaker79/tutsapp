@extends('layouts.app')
@section('content')
<div class="panel" id="forumQuestion">
    <div class="panel-heading">
        <hr>
        <h3 class="text-center">{{$question->question}}</h3>
        <hr>
        <P class="post_user text-right">
            <i>Posted by</i> <span>{{$question->user->name}}</span>
            On <span> {{$question->created_at->format('F j, Y')}} </span></p>
    </div>
</div>
@include('forum.common.replies')
<div id="reply-box" class="panel container">
    <form action="{{ route('postDiscussion',['id'=>he($question->id)]) }}" method="post">
        {{ csrf_field() }}
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
