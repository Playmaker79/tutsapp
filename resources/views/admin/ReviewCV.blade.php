@extends('layouts.app')
<style>
    #course_list{
        background: white;
    }
</style>
@section('content')
    <div class="container" id="course_list">
        <h1 class="text-center">Mentors</h1>
        <br>
        {{--print errors--}}
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach

        {{--print messages after form submit--}}
        @if(Session::has('message'))
            <br>
            <div class="row">
                <div class="col-md-8 col-md-offset-2" id="flash_message">
                    <div class="alert alert-{{Session::get('type')}} alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <p class="text-center">
                            <span class="text-center">{{Session::get('subject')}}</span>
                        </p>
                    </div>
                </div>
            </div>
        @endif
        <table class="table table-bordered table-hover table-responsive">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Uploaded at</th>
                <th>CV</th>
                <th>status</th>
            </tr>
            @foreach($cvs as $cv)
                <tr>
                    <td>
                        <b>{{$cv->user->name}}</b>
                    </td>
                    <td>
                        <p>{{$cv->user->email}}</p>
                    </td>
                    <td>
                        <p>{{$cv->created_at}}</p>
                    </td>
                <td>
                        <a  class="btn btn-default"
                            href="{{route('CVpdfview',['path'=>($cv->path)])}}" target="_blank">Review</a>
                    </td>
                        @if($cv->user->status == 0)
                            <td>
                                <span class="label label-warning"> New
                                &nbsp;
                                <a  class="animbtn btn btn-primary"
                                     href="{{ route('approveCV',['id'=>he($cv->id)]) }}"> Approve</a>
                                </span>
                            </td>
                        @elseif($cv->user->status == 1)
                            <td>
                                <span class="label label-success"> Active
                                &nbsp;
                                <a  class="animbtn btn btn-danger"
                                    href="{{ route('disapproveCV',['id'=>he($cv->id)]) }}" >Block</a>
                                    </span>
                            </td>
                        @elseif($cv->user->status ==2)
                            <td>
                                <span class="label label-danger"> Blocked
                                &nbsp;
                                <a  class="animbtn btn btn-success"
                                    href="{{ route('approveCV',['id'=>he($cv->id)]) }}">Unblock</a>
                                    </span>
                            </td>
                        @endif

                </tr>
            @endforeach
        </table>
    </div>
    <br>
    <script>
        $("#flash_message").delay(2000).slideUp();
    </script>
@endsection


