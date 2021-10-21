<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Channel extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function videos(){
      return $this->hasMany(Video::class);
    }
    
    public function getThumbnail(){
        return isset( $this->thumbnail) ? asset('storage/'. $this->thumbnail) : '/images/default.jpg';
    }

    public function subscriptions(){
        return $this->hasMany(Subscription::class);
    }

    public function subscribers(){
      return $this->subscriptions->count();
    }
}
