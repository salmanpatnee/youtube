<?php

namespace App\Http\Livewire\Video;

use App\Models\Channel;
use App\Models\Video;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class CreateVideo extends Component
{
    use WithFileUploads;
    
    public Channel $channel;
    public Video $video;
    public $videoFile;

    protected $rules = [
      'videoFile' => 'required|mimes:mp4|max:1228800'
    ];

    public function mount(Channel $channel){
      $this->channel = $channel;
    }

    public function render()
    {
        return view('livewire.video.create-video')->extends('layouts.app');
    }

    public function uploadFinished()
    {
      $this->validate();

      $path = $this->videoFile->store('videos-temp');

      $this->video = $this->channel->videos()->create([
        'title'       => 'Untitled', 
        'description' => 'Description', 
        'uid'         => uniqid(true), 
        'path'        => Str::after($path, '/')
      ]);

      return redirect()->route('videos.edit', [
        'channel' => $this->channel, 
        'video'   => $this->video
      ]);

    }

    // public function upload(){
      
    //     $this->validate([
    //       'videoFile' => 'required|mimes:mp4|max:102400'
    //     ]);

    // }
}
