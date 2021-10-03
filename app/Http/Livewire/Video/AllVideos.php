<?php

namespace App\Http\Livewire\Video;

use App\Models\Channel;
use App\Models\Video;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class AllVideos extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    use AuthorizesRequests;

    public $channel;

    public function mount(Channel $channel){
        $this->channel = $channel;
    }

    public function render()
    {
        return view('livewire.video.all-videos')
            ->with('videos', $this->channel->videos()->paginate(15))
            ->extends('layouts.app');
    }

   

    public function delete(Video $video){
        
        $this->authorize('update', $video);

        $deleted = Storage::disk('videos')->deleteDirectory($video->uid);

        if($deleted){
            $video->delete();
        }

        return back();
    }
}
