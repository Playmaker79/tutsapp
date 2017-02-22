<style>
    .navbar{
        margin-bottom:0px !important;
        border-top: 0px;
    }
    .cover{
        padding:100px;
        background: url({{route('coverImage',['id'=>$course->cover])}});
        margin-bottom:20px;
        background-size: contain;
    }

    .cover h1{
        background: linear-gradient(rgb(243, 243, 243),rgba(243, 243, 243, 0.55));
        font-weight: 300;
        padding:10px;
    }
</style>
<div class="cover">
    <h1 class="text-center">{{$course->name}}</h1>
</div>