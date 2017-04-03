@extends('layouts.app')
@section('content')
    <?php  $questions = $quiz_data->question ?>
     <div id="wrapper">
        <div class="panel">
           <div class="panel-heading">
               <h1 class="text-center"><hr>Answer the questions<hr></h1>
           </div>
        </div>

         <div class="container">
             <form id="questions_container" action="" method="post">
                 {{ csrf_field() }}

                 <input type="hidden" value="{{ he($quiz_data->chapter_id) }}"
                        name="chapter_id">

                 @foreach($questions as $question)
                     <div class="panel  panel-default quiz_table">
                         <div class="panel-heading">
                             <span class="qbox">Q</span>
                             <h4 class="text-left">{{$question->question}}</h4>
                         </div>
                         <div class="">
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
                     <input  type="submit" class="button btn btn-primary pull-right" value="Submit answers">
             </form>
         </div>
     </div>
@endsection




