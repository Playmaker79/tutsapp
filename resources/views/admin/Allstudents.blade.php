@extends('layouts.app')
<style>
    .container{
        background: white;
    }
</style>
@section('content')
    <div class="container">
        <h1 class="text-center">Registerd students</h1>
        <table class="table table-bordered table-hover table-responsive">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Accounted created</th>
                <th>status</th>
            </tr>
            @foreach($students as $student)
                <tr>
                    <td>
                        <b>{{$student->name}}</b>
                    </td>
                    <td>
                        <p>{{$student->email}}</p>
                    </td>
                    <td>
                        <p>{{$student->created_at}}</p>
                    </td>
                    @if($student->status==0)
                        <td>
                                <span class="label label-warning"> New
                                &nbsp;
                                <a  class="btn btn-primary"
                                    href="{{ route('unblockUser',['id'=>he($student->id)]) }}"> Approve</a>
                                </span>
                        </td>
                    @elseif($student->status==1)
                        <td>
                                <span class="label label-success"> Active
                                &nbsp;
                                <a  class="btn btn-danger"
                                    href="{{ route('blockUser',['id'=>he($student->id)]) }}">Block</a>
                                    </span>
                        </td>
                    @elseif($student->status==2)
                        <td>
                                <span class="label label-danger"> Blocked
                                &nbsp;
                                <a  class="btn btn-success"
                                    href="{{ route('unblockUser',['id'=>he($student->id)]) }}">Unblock</a>
                                    </span>
                        </td>
                    @endif

                </tr>
            @endforeach
        </table>
    </div>
@endsection


