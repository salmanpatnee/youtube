<div>
    <form method="POST" wire:submit.prevent="update">
        @csrf
        
        <x-flash />

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
            <div class="col-md-6">
                <input 
                    id="name" 
                    type="text" 
                    class="form-control @error('channel.name') is-invalid @enderror" 
                    name="name" 
                    wire:model="channel.name"
                    autofocus>

                    @error('channel.name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="slug" class="col-md-4 col-form-label text-md-right">{{ __('Slug') }}</label>
            <div class="col-md-6">
                <input 
                    id="slug" 
                    type="text" 
                    class="form-control @error('channel.slug') is-invalid @enderror" 
                    name="slug" 
                    wire:model="channel.slug">

                    @error('channel.slug')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
            <div class="col-md-6">
                <textarea name="description" wire:model="channel.description" id="description" class="form-control @error('channel.description') is-invalid @enderror" cols="30" rows="5"></textarea>
                @error('channel.description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Update') }}
                </button>
            </div>
        </div>
    </form>
</div>
