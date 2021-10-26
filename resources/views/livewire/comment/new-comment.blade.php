<div>
    <div class="d-flex align-items-center">
        <img class="mr-3 rounded-circle img-thumbnail" src="https://i.pravatar.cc/50?img=1" alt="">
        <textarea placeholder="Add new comment" name="body" id="body" cols="2" rows="2" style="width: 50%" wire:model="body" class="form-control" cols="30" rows="10"></textarea>
    </div>
    <div class="d-flex justify-content-center align-items-center mt-4">
        @if ($body)
            <a href="" wire:click.prevent="resetForm" class="btn btn-link">Cancel</a>
            <a href="" wire:click.prevent="addComment" class="btn btn-primary">Comment</a>
        @endif
    </div>
</div>
