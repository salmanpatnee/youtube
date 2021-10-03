<div class="container" @if($this->video->processing_percentage < 100) wire:poll @endif>

    <form wire:submit.prevent="update">
      
        <x-flash />

        <div class="form-group row d-flex align-items-center justify-content-center">
            
            <div class="col-md-6">
               <img src="{{asset($this->video->poster)}}" alt="Thumbnail" class="img-fluid">
            </div>
            <div class="col-md-6">
                <p>Processing: ({{$this->video->processing_percentage}})</p>
             </div>
        </div>
        
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
