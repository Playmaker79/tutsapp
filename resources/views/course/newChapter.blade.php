@extends('layouts.app')
<style>
    #course-wrapper {
        background: white;
        border: 0.5px solid #dfdfdf;
    }
    .alert-red{
        background: #e55469;
        color:white;
    }
</style>

@section('content')

    {{--rich text editor scripts & styles--}}
    <link href="/css/summernote.css" rel="stylesheet">
    <script src="/js/summernote.js"></script>

    <div class="container" id="course-wrapper">
        <span class="alert alert-red">- Add a new chapter -</span>
        <hr>
        <h1 class="text-center">{{$course->name}}</h1>
        <hr>
        {{--chapter form--}}
        <form action="{{ route('postChapter',['id'=>he($course->id)]) }}" id="chapter_form" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{--chapter name--}}
            <div class="form-group">
                <label for="name">Name of chapter</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            {{--chapter notes editor--}}
            <div class="form-group">
                <label for="notes_editor">Chapter notes</label>
                <div id="notes_editor" class="form-control"></div>
            </div>

            {{--chapter Ebooks/presentation--}}
            <div class="form-group">
                <label for="pdfMaterial">Ebooks/presentation</label>
                <input type="file" name="pdfMaterial" class="form-control" required accept="application/pdf">
            </div>

            {{--chapter videos--}}
            <div class="form-group">
                <label for="video_tutorial">Video tutorial</label>
                <input type="file" name="video_tutorial"  class="form-control" accept="video/mp4" required>
            </div>

            {{--submit button--}}
            <input type="submit" class="button btn btn-primary btn-lg" style="float:right">
        </form>
        <script>

            /* setup rich text editor */
            $('#notes_editor').summernote({
                height: 300,
                minHeight: null,
                maxHeight: null,
                focus: true,
                theme:'default'
            });

            /*
             * get notes from rich text editor
             * add notes to a hidden input
             */
            function addNotes(){
                var notes =$('<input>').attr({
                    type: 'hidden',
                    value: $('#notes_editor').summernote('code'),
                    name: 'notes'
                })

                $('#chapter_form').append(notes);
            }

            /*
             * prevent form from submit
             * append hidden input to the form
             * submit the form
             */
            $('#chapter_form').submit(function (event) {
                event.preventDefault();
                addNotes();
                this.submit();
            });
        </script>
    </div>
@endsection


