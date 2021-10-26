@section('custom-css')
        <link href="https://vjs.zencdn.net/7.15.4/video-js.css" rel="stylesheet" />
@endsection
    
    <div class="container-fluid">    

    <div class="row">
        <div class="col-md-12">
            <div class="embed-responsive embed-responsive-4by3" style="height: 490px">

                <video
                id="yt-video"
                class="video-js vjs-styles=defaults vjs-big-play-centered embed-responsive-item"
                controls
                preload="auto"
                poster="{{asset($video->poster)}}"
                data-setup="{}">

                <source src="{{asset('storage/videos/' . $video->uid . '/' . $video->processed_file)}}" type="application/x-mpegURL" />

                    <p class="vjs-no-js">
                    To view this video please enable JavaScript, and consider upgrading to a
                    web browser that
                    <a href="https://videojs.com/html5-video-support/" target="_blank"
                    >supports HTML5 video</a
                    >
                    </p>
                </video>
            </div>
        </div>
    </div>

    <div class="row mt-2 d-flex align-items-center">
        <div class="col-md-6">
            <h3>{{$video->title}}</h3>
            <p>{{$video->views}} {{ Str::of('View')->plural($video->views)}} | {{$video->created_at->diffForHumans()}}</p>
        </div>
        <div class="col-md-6">
            <livewire:video.voting :video="$video"/>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <livewire:channel.channel-info :channel="$video->channel"/>
        </div>
    </div> 
    <hr>
    
    @auth
        <livewire:comment.new-comment :video="$video" :key="$video->id"/>    
    @endauth
    
    
    <livewire:comment.comments :video="$video"/>
</div>
@section('custom-js')
<script src="https://vjs.zencdn.net/7.15.4/video.min.js"></script>
<script>
    var player = videojs('yt-video');

    player.on('timeupdate', function(){
    
        if(this.currentTime() > 5){

            this.off('timeupdate');
            
            Livewire.emit('VideosViewed');
        }
        
    });
</script>
@endsection