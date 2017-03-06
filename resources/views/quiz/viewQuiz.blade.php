@extends('layouts.app')
@section('content')
    <?php  $questions = $quiz_data->question ?>
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
            border-top:5px solid #E55469;
        }

        .quiz_table table td{
            font-weight: bold;
        }
    </style>
     <div id="wrapper">
         <h1 class="text-center"><hr>Answer the questions<hr></h1>

         <div class="container">
             <form id="questions_container" action="" method="post">
                 {{ csrf_field() }}

                 <input type="hidden" value="{{ he($quiz_data->chapter_id) }}"
                        name="chapter_id">

                 @foreach($questions as $question)
                     <div class="panel panel-default quiz_table">
                         <div class="panel-heading">
                             <span class="qbox">Q</span>
                             <h4>{{$question->question}}</h4>
                         </div>
                         <div class="panel-body">
                             <table class="table table-responsive">
                                 <tr>
                                     {{--options--}}
                                     <td>
                                         <input type="radio" name="{{ he($question->id) }}" class="button btn btn-default" value="A"  required > {{$question->optionA}}
                                     </td>
                                     <td>
                                         <input type="radio" name="{{ he($question->id) }}" class="button btn btn-default" value="B" required> {{$question->optionB}}
                                     </td>
                                     <td>
                                         <input type="radio" name="{{ he($question->id) }}" class="button btn btn-default" value="C" required> {{$question->optionC}}
                                     </td>
                                     <td>
                                         <input type="radio" name="{{ he($question->id) }}" class="button btn btn-default" value="D" required> {{$question->optionD}}
                                     </td>
                                 </tr>
                             </table>
                         </div>
                     </div>
                 @endforeach
                     <input  type="submit" class="button btn btn-success pull-right" value="Submit answers">
             </form>
         </div>
     </div>
@endsection




