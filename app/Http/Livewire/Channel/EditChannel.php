<?php

namespace App\Http\Livewire\Channel;

use App\Models\Channel;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class EditChannel extends Component
{
    use AuthorizesRequests;
    use WithFileUploads;

    public $channel, $thumbnail;

    public function mount(Channel $channel)
    {
        $this->channel = $channel;
    }

    protected function rules()
    {
        return [
            'channel.name'          => 'required|min:3|max:255',
            'channel.slug'          => ['required', Rule::unique('channels', 'slug')->ignore($this->channel)],
            'channel.description'   => 'nullable|max:1000',
            'thumbnail'             => 'nullable|image',
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

        $this->uploadThumbnail();

        return back()->with('message', 'Channel updated.');
    }

    public function uploadThumbnail(){

        if(!$this->thumbnail) return;

        $thumbnail = $this->thumbnail->StoreAs('images', $this->channel->uid.'.png');

        $this->resizeThumbnail($thumbnail);

        $this->channel->update([
            'thumbnail' =>  $thumbnail, 
        ]);
    }

    public function resizeThumbnail($thumbnail){

        $thumbnailPath  = public_path('/storage/') . $thumbnail;

        \Image::make($thumbnailPath)
                        ->encode('png')
                        ->fit(80, 80, function($constraint){
                            $constraint->upsize();
                        })->save();
    }
}
