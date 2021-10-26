<div>
    <h4>
        {{$video->commentsCount()}} Comments
    </h4>
    
    @if (count($video->comments))
        @include('comments.comment', ['comments' => $video->comments()->latest()->get()])
    @endif
    
</div>
