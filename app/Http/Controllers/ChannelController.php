<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\User;
use Illuminate\Http\Request;

class ChannelController extends Controller
{
    public function create()
    {
        return view('channels.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Channel::class);

        $attributes = request()->validate([
            'name'  => 'required|min:3|max:255',
        ]);

        auth()->user()->createChannel($attributes);

        return redirect('/')->with('message', 'Channel created.');
    }

    public function edit(Channel $channel)
    {
        return view('channels.edit', compact('channel'));
    }
}
