<?php

namespace App\Http\Livewire\Channel;

use App\Models\Channel;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Illuminate\Validation\Rule;

class EditChannel extends Component
{
    use AuthorizesRequests;

    public $channel;

    public function mount(Channel $channel)
    {
        $this->channel = $channel;
    }

    protected function rules()
    {
        return [
            'channel.name'        => 'required|min:3|max:255',
            'channel.slug'        => ['required', Rule::unique('channels', 'slug')->ignore($this->channel)],
            'channel.description' => 'nullable|max:1000',
        ];
    }
   

    public function render()
    {
        return view('livewire.channel.edit');
    }

    public function update()
    {
       
        $this->authorize('update', $this->channel);

        $this->validate();
        
        $this->channel->update([
            'name'        => $this->channel->name, 
            'slug'        => $this->channel->slug, 
            'description' => $this->channel->description, 
        ]);

        return back()->with('message', 'Channel updated.');
    }
}
