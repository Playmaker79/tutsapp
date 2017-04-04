<div class="container">
    @foreach($replies as $reply)
        <div class="panel forumReply">
            <div class="panel-heading">
                <p class="text-right">{{$reply->user->name}}</p>
            </div>
            <div class="panel-content">
                <p>
                    {{ $reply->message }}
                </p>
            </div>
        </div>
    @endforeach
</div>
