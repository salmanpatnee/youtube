
@foreach ($comments as $comment)
    <div class="media mt-3" x-data="{open:false, openReply:false}">
        <img class="mr-3 rounded-circle img-thumbnail" src="https://i.pravatar.cc/50?img={{$comment->user->id}}" alt="">
        <div class="media-body">
            <h5 class="mt-0">{{$comment->user->name}} 
                <small class="text-muted">
                    {{$comment->created_at->diffForHumans()}}
                </small>
            </h5> 
            {{$comment->body}}
            
            <p>
                <a href="" @click.prevent="openReply = !openReply">Reply</a>
            </p>
            
            @auth
                <div x-show="openReply">
                    <livewire:comment.new-comment :commentId="$comment->id" :video="$video" :key="$comment->id.time()"/>
                </div>
            @endauth


            @if ($comment->replies->count())
                <a href="#" @click.prevent="open = !open">{{$comment->replies->count()}} Replies</a>   

                <div x-show="open">
                    @include('comments.comment', ['comments' => $comment->replies])
                </div>
                
            @endif
        </div>
    </div>
@endforeach