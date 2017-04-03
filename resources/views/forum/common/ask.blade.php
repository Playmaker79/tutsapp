{{--Text box to handle user forum queries--}}
<div class="panel container">
    <form action="{{ route('forumAsk') }}" method="post">
        {{ csrf_field() }}
        <h2 class="text-center">Ask Something</h2>
        <hr>
        <div class="form-group input-group-lg">
            <textarea name="question" type="text" class="form-control" rows="2"></textarea>
            <br>
            <input type="submit" value="Post" class="button btn btn-primary pull-right">
        </div>
        <br>
    </form>

</div>