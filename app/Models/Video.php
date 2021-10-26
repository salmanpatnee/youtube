<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }

    public function getPosterAttribute(){
        if($this->thumbnail){
           return 'storage/videos/' . $this->uid . '/' . $this->thumbnail; 
        } else {
            return 'storage/videos/' . 'default.png'; 
        }
    }

    public function getRouteKeyName()
    {
        return 'uid';
    }

    public function likes(){
      return $this->hasMany(Like::class);
    }

    public function dislikes(){
        return $this->hasMany(Dislike::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class)->whereNull('reply_id');
    }

    public function commentsCount(){
        return $this->hasMany(Comment::class)->count();
    }
}
