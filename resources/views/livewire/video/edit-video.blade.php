<div>
    <form wire:submit.prevent="update">
      
        <x-flash />

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>
            <div class="col-md-6">
                <input 
                    id="title" 
                    type="text" 
                    class="form-control @error('video.title') is-invalid @enderror" 
                    wire:model="video.title"
                    autofocus>

                    @error('video.title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
            <div class="col-md-6">
                <textarea 
                id="description" 
                class="form-control @error('video.title') is-invalid @enderror" 
                wire:model="video.description">
            </textarea>
                   
                @error('video.description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Visibility') }}</label>
            <div class="col-md-6">
                <select 
                    id="visibility" 
                    class="form-control @error('video.title') is-invalid @enderror" 
                    wire:model="video.visibility"
                    >
                    <option value="private">Private</option>
                    <option value="public">Public</option>
                    <option value="unlisted">Unlisted</option>
                </select>
                   
                @error('video.visibility')
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
