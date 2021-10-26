<?php

namespace App\Http\Livewire\Comment;

use App\Models\Video;
use Livewire\Component;

class NewComment extends Component
{
    public $video;
    public $body;
    public $commentId;

    public function mount(Video $video, $commentId = null){
        $this->video = $video;
        $this->commentId = $commentId;
    }

    public function render()
    {
        return view('livewire.comment.new-comment');
    }

    public function resetForm(){
      $this->body = "";
    }

    public function addComment(){
        auth()->user()->comments()->create([
            'body' => $this->body, 
            'video_id' => $this->video->id, 
            'reply_id' => $this->commentId
        ]);

        $this->body = "";

        $this->emit('commentAdded');
    }
}
