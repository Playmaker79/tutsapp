@extends('layouts.app')
@section('content')
        <style>
                #quiz_maker{
                        background: white;
                }
                .qbox{
                        padding:10px;
                        margin:10px;
                        color:whitesmoke;
                        font-weight:bold;
                        box-shadow: 3px 4px 3px rgba(90, 90, 94, 0.3);
                }
                .quiz_table{
                        border-top:5px solid #E55469;
                }

                .quiz_table table td{
                        font-weight: bold;
                }

                body{
                        line-height: inherit !important;
                }
                .quiz_table h4{
                        margin-top: 2em;
                }

                .wrong-bg{
                        background: #F6511D;
                        color:white;
                }

                .wrong-border{
                        border-top:5px solid #F6511D;
                }

                .correct-border{
                        border-top:5px solid #5bc20b;
                }
                .correct-bg{
                        background: #5bc20b;
                        color:white;
                }

        </style>
        <div id="wrapper" class="container">
                <h1 class="text-center"><hr>Quiz Results<hr></h1>
                <div class="panel">
                        <h2 class="text-center panel-heading">
                                Score :{{ $results['score']}} out of <b>{{ $results['total'] }}</b>
                        </h2>
                        <h3 class="text-center">
                                status: {{$results['status']}}
                        </h3>
                </div>

        @foreach($questions as $question)
                <?php
                if($question->answerd == false){
                        $statusColor = "wrong";
                        $buttonText = "wrong answer";
                }else{
                        $statusColor = "correct";
                        $buttonText = "correct answer";
                }
                ?>
        <div class="panel panel-default quiz_table {{$statusColor}}-border">
                <div class="panel-heading">
                        <span class="qbox {{$statusColor}}-bg">Q</span>
                        <button class="pull-right button btn {{$statusColor}}-bg">{{$buttonText}}</button>
                        <h4>{{$question->question}}</h4>
                </div>
                <div class="panel-body">
                        <table class="table table-responsive">
                                <tr>
                                        {{--options--}}
                                </tr>
                        </table>
                </div>
        </div>
                @endforeach
</div>
@endsection