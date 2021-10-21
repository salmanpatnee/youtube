<?php

namespace App\Http\Livewire\Channel;

use App\Models\Channel;
use App\Models\Subscription;
use Livewire\Component;

class ChannelInfo extends Component
{
    public $channel;
    public $isSubscribedTo = false;

    public function mount(Channel $channel){
        
        if(auth()->check() && auth()->user()->isSubscribedTo($channel)){
            $this->isSubscribedTo = true;
        }

        $this->channel = $channel;
    }

    public function render()
    {
        return view('livewire.channel.channel-info')->extends('layouts.app');
    }

    public function subscriptionToggle(){
        if(auth()->user()->isSubscribedTo($this->channel)){
            Subscription::where('user_id', auth()->id())->where('channel_id', $this->channel->id)->delete();
            $this->isSubscribedTo = false;
        } else {
            auth()->user()->subscriptions()->create([
                'channel_id' => $this->channel->id
            ]);
            
            $this->isSubscribedTo = true;
        }
    }
}
