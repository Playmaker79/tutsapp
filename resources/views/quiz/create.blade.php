@extends('layouts.app')
@section('content')
    <style>
        #quiz_maker{
            background: white;
        }
        .qbox{
            background: #e55469;
            padding:10px;
            margin:10px;
            color:whitesmoke;
            font-weight:bold;
            box-shadow: 3px 4px 2px rgba(90, 90, 94, 0.3);
        }
        .quiz_table{
            border-top:10px solid #f4f4f4;
        }


    </style>
    @include('partials.chapterCover',['course'=>$course])
    <h1 class="text-center">Quiz maker</h1>
    <div class="container" id="quiz_maker">
        <br>
        <button type="button" class="btn btn-success btn-lg center-block" data-toggle="modal" data-target="#addquestion">
            <b>Add question</b>
        </button>
        <br>
        <div id="questions_container">
            <hr><h3 class="text-left">Questions</h3><hr>
            @foreach($questions as $question)
                <div class="panel panel-default quiz_table">
                   <div class="panel-heading">
                       <span class="qbox">Q</span>
                       <h4>{{$question->question}}</h4>
                   </div>
                    <div class="panel-body">
                        <table class="table table-hover table-responsive">
                           <tr>
                               <th>Option A</th>
                               <th>Option B</th>
                               <th>Option C</th>
                               <th>Option D</th>
                               <th>Answer</th>
                               <th></th>
                           </tr>
                            <tr>
                                <td>
                                    <button class="button btn btn-default">{{$question->optionA}}</button>
                                </td>
                                <td>
                                    <button class="button btn btn-default">{{$question->optionB}}</button>
                                </td>
                                <td>
                                    <button class="button btn btn-default">{{$question->optionC}}</button>
                                </td>
                                <td>
                                    <button class="button btn btn-default">{{$question->optionD}}</button>
                                </td>
                                <td>
                                    <button class="button btn btn-primary">option {{$question->answer}}</button>
                                </td>
                                <td>
                                    <a href="#" class="button btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            @endforeach
        </div>
        {{--add question form--}}
        <div id="addquestion" class="modal fade" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="#" class="modal-body" method="post">
                        {{ csrf_field() }}
                        <div class="modal-header">
                            <h2 class="text-center">Add new Question</h2>
                        </div>
                        {{--quiz question--}}
                        <div class="form-group">
                            <label for="question">Question</label>
                    <textarea name="question" id="question" cols="30"
                              rows="2" class="form-control"></textarea>
                        </div>

                        {{--option A--}}
                        <div class="form-group">
                            <label for="optionA">Option A</label>
                            <input type="text" class="form-control" name="optionA">
                        </div>

                        {{--option B--}}
                        <div class="form-group">
                            <label for="optionB">option B</label>
                            <input type="text" class="form-control" name="optionB">
                        </div>

                        {{--option C--}}
                        <div class="form-group">
                            <label for="optionB">option C</label>
                            <input type="text" class="form-control" name="optionC">
                        </div>

                        {{--option D--}}
                        <div class="form-group">
                            <label for="optionB">option D</label>
                            <input type="text" class="form-control" name="optionD">
                        </div>

                        {{--Answer--}}
                        <div class="form-group">
                            <label for="optionB">Answer</label>
                            <select class="form-control" name="answer">
                                <option value="A">option A</option>
                                <option value="B">option B</option>
                                <option value="C">option C</option>
                                <option value="D">option D</option>
                            </select>
                        </div>

                        <div class="modal-footer">
                            <input type="submit" class="button btn btn-submit pull-right">
                        </div>
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection