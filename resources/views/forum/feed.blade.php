@extends('layouts.app')
@section('content')
<div class="panel">
    <div class="panel-heading">
        <hr>
        <h1 class="text-center">Discussion Forum</h1>
        <hr>
    </div>
</div>
    {{--forum question text field--}}
    @include('forum.common.ask')
    @include('forum.common.discussions')
@endsection
