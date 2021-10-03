<div class="container-fluid">
    @section('custom-css')
        <link href="https://vjs.zencdn.net/7.15.4/video-js.css" rel="stylesheet" />
    @endsection

    <div class="row">
        <div class="col-md-12">
            <div class="embed-responsive embed-responsive-4by3" style="height: 490px">

            <video
            id="yt-video"
            class="video-js vjs-styles=defaults vjs-big-play-centered embed-responsive-item"
            controls
            preload="auto"
            {{-- poster="MY_VIDEO_POSTER.jpg" --}}

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
</div>
