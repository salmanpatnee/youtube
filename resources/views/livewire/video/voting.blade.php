<div class="d-flex">
    <div class="d-flex align-items-center text-gray mr-4" style="cursor: pointer">
        <i class="fa @if($likeActive) fa-thumbs-up text-primary @else fa-thumbs-o-up @endif fa-2x mr-2" aria-hidden="true" wire:click.prevent="like"></i>
        <span>{{$likes}}</span>
    </div>
    <div class="d-flex align-items-center text-gray" style="cursor: pointer">
        <i class="fa @if($dislikeActive) fa-thumbs-down text-primary @else fa-thumbs-o-down @endif fa-2x mr-2" aria-hidden="true" wire:click.prevent="dislike"></i>
        <span>{{$dislikes}}</span>
    </div>
</div>
