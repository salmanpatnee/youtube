<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if ($videos->count())
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">Thumbnail</th>
                            <th scope="col">Title</th>
                            <th scope="col">Visibility</th>
                            <th scope="col">Published On</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($videos as $video)
                            <tr>
                                <td>
                                    <a href="{{route('videos.watch', $video)}}">
                                        <img src="{{asset($video->poster)}}" class="img-thumbnail img-fluid" width="150" alt="">
                                    </a>
                                </td>
                                <td>
                                    <h5>{{$video->title}}</h5>
                                    <p>{{$video->description}}</p>
                                </td>
                                <td>
                                    {{$video->visibility}}
                                </td>
                                <td>
                                    {{$video->created_at->format('d/m/Y')}}
                                </td>
                               
                                <td>
                                    @can('update', $video)
                                        <a href="{{ route('videos.edit', ['channel' => $video->channel->slug, 'video' => $video->uid]) }}" class="btn btn-sm btn-secondary">Edit</a>
                                        <a wire:click.prevent="delete('{{$video->uid}}')" class="btn btn-sm btn-danger">Delete</a>
                                    @endcan
                                </td>
                                
                               
                              </tr>
                            @endforeach
                        </tbody>
                      </table>
                    </div>
                @else
                <p>No videos yet.</p>
                @endif
               
            </div>
            <div class="">
                {{$videos->links()}}
            </div>
        </div>
    </div>
   
</div>
