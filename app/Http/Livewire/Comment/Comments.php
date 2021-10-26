<?php

namespace App\Http\Livewire\Comment;

use App\Models\Video;
use Livewire\Component;

class Comments extends Component
{
    public $video;
    
    protected $listeners = ['commentAdded' =>  '$refresh'];

    public function mount(Video $video){
        $this->video = $video;
    }

    public function render()
    {
        return view('livewire.comment.comments');
    }
}
