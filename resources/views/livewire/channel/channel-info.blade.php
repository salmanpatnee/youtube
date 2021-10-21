<div class="my-5">
    <div class="d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center">
            <img src="{{$channel->getThumbnail()}}" class="rounded-circle">
            <div class="ml-2">
                <h4>{{$channel->name}}</h4>
                <p class="gray-text text-sm">{{$channel->subscribers()}} Subscribers</p>
            </div>
        </div>
        <div>
            <button wire:click.prevent="subscriptionToggle" class="btn  btn-lg text-uppercase  {{$isSubscribedTo ? 'btn-secondary' : 'btn-danger'}}">
                {{$isSubscribedTo ? 'Subscribed' : 'Subscribe'}}
            </button>
        </div>
    </div>
</div>
