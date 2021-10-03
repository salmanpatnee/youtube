<?php

namespace App\Http\Livewire;

use App\Models\Video;
use Livewire\Component;

class WatchVideo extends Component
{
    public $video;

    protected $listeners = ['VideosViewed' => 'addView'];

    public function addView(){
        
        $this->video->update([
            'views' => $this->video->view + 1
        ]);
    }

    public function mount(Video $video){
        $this->video = $video;
    }

    public function render()
    {
        return view('livewire.video.watch-video')->extends('layouts.app');
    }
}
