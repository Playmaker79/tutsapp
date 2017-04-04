<div class="container panel">
    <div class="pull-right">{{ $feeds->links() }}</div>
</div>
<div id="feed" class="container">
    {{--feeds--}}
    <div class="row">
        @foreach($feeds as $feed)
            <div class="feed panel">
                <div class="panel-heading">
                    <h4><a href="{{route('forumDiscussion',
                    ['id' => he($feed->id)])}}">{{$feed->question}}</a>
                    </h4>
                </div>
                <div class="panel-footer">
                    <P class="post_user text-right">
                        <i>Posted by</i> <span>{{$feed->user->name}}</span>
                        On <span> {{$feed->created_at->format('F j, Y')}} </span></p>
                </div>
            </div>
        @endforeach
    </div>
    </div>
</div>