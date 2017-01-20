@extends('layouts.app')
<style>
    .container{
        background: white;
    }
</style>
@section('content')
    <div class="container">
        <h1 class="text-center">All courses</h1>
        <table class="table table-bordered table-hover table-responsive">
            <tr>
                <th>Name</th>
                <th>Mentor</th>
                <th>Description</th>
                <th>Created at</th>
                <th>Status</th>
                <th></th>
            </tr>
            @foreach($courses as $course)
                <tr>
                    <td>
                        <b>{{$course->name}}</b>
                    </td>
                    <td>
                        <p>{{$course->user->name}}</p>
                    </td>
                    <td>
                        <p>{{$course->description}}</p>
                    </td>
                    <td>
                        <p>{{$course->created_at}}</p>
                    </td>
                    @if($course->status==0)
                        <td>
                                <span class="label label-warning"> New
                                &nbsp;
                                <a  class="btn btn-primary"
                                    href="{{ route('approveCourse',['id'=>he($course->id)]) }}">  Approve</a>
                                </span>
                        </td>
                    @elseif($course->status==1)
                        <td>
                                <span class="label label-success"> Active
                                &nbsp;
                                <a  class="btn btn-danger"
                                    href="{{ route('disapproveCourse',['id'=>he($course->id)]) }}">Disapprove</a>
                                    </span>
                        </td>
                    @elseif($course->status==2)
                        <td>
                                <span class="label label-danger"> disapproved
                                &nbsp;
                                <a  class="btn btn-success"
                                    href="{{ route('approveCourse',['id'=>he($course->id)]) }}">Approve</a>
                                    </span>
                        </td>
                    @endif
                    <td>
                        <a  class="btn btn-danger"
                            href="{{ route('deleteCourse',['id'=>he($course->id)]) }}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection


