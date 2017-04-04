{{--Text box to handle user forum queries--}}
<div class="panel panel-primary container">
    <form action="{{ route('forumAsk') }}" method="post">
        {{ csrf_field() }}
        <div class="panel-title">
            <h2 class="text-center ">Ask Something</h2>
        </div>
        <hr>
        <div class="form-group input-group-lg">
            <textarea name="question" type="text" class="form-control" rows="2"></textarea>
            <br>
            <input type="submit" value="Post" class="button btn btn-primary pull-right">
        </div>
        <br>
    </form>

</div>