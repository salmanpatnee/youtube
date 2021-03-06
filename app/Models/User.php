<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $with = ['channel'];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('channelCount', function ($builder) {
            $builder->withCount('channel');
        });
    }

    public function channel()
    {
        return $this->hasOne(Channel::class);
    }



    public function createChannel($attributes)
    {
        $attributes['uid']  = uniqid(true);

        $this->channel()->create($attributes);
    }

    public function subscriptions(){
        return $this->hasMany(Subscription::class);
    }

    public function subscribedChannels(){
      return $this->belongsToMany(Channel::class, 'subscriptions');
    }

    public function isSubscribedTo(Channel $channel){
      return (bool) $this->subscriptions->where('channel_id', $channel->id)->count();
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }


}
