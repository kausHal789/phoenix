@extends('layouts.app')

@section('head-section')
{{-- it all for further use --}}
  {{-- <script src="{{ asset('js/html5media.min.js') }}" type="text/javascript"></script> --}}
  {{-- <script src="{{ asset('js/plyr.min.js') }}" type="text/javascript"></script> --}}

  {{-- <link href="{{ asset('css/audio-tag.css') }}" rel="stylesheet">   --}}
  {{-- <link href="{{ asset('css/plyr.css') }}" rel="stylesheet">   --}}
  <link href="{{ asset('css/dropdown.css') }}" rel="stylesheet">  
@endsection

@section('content')
<div class="container">

<form class="" action="{{ route('song.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label for="title">{{ __('Title')}}</label>
        <input 
            type="text" 
            class="form-control @error('title') is-invalid @enderror" 
            id="title" 
            name="title"
            placeholder="Title" 
            value="{{ old('title') }}"
            required
            autocomplete="title" 
            autofocus>
          @error('title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
          @enderror
      </div>
    </div>

    <div class="form-row">
      <div class="col-4 mb3">
        <label for="writer">{{ __('Writer')}}</label>
        <input type="text" 
          class="form-control @error('writer') is-invalid @enderror" 
          id="writer"
          name="writer" 
          placeholder="Writer" 
          value="{{ old('writer') }}" 
          required
          autocomplete="writer" 
          autofocus>
        @error('writer')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <div class="col-4 mb3">
        <label for="producer">{{ __('Producer')}}</label>
        <input type="text" 
          class="form-control @error('producer') is-invalid @enderror" 
          id="producer"
          name="producer" 
          placeholder="Producer" 
          value="{{ old('producer') }}" 
          required
          autocomplete="producer" 
          autofocus>
        @error('producer')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <div class="col-md-4 mb-3">
        <label for="source">{{ __('Source')}}</label>
        <input 
            type="text" 
            class="form-control @error('source') is-invalid @enderror" 
            id="source" 
            name="source"
            placeholder="Source" 
            value="{{ old('source') }}"
            required
            autocomplete="source" 
            autofocus>
          @error('source')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
          @enderror
      </div>
    </div>

    <div class="form-row">
      <div class="col-2 mb-2">
        <label for="category">{{ __('Category')}}</label>
        <div class="drop-down">
          <select name="category" id="category" class="data-menu" data-menu>
            <option>{{ __('Category') }}</option>
            @foreach ($categories as $item)
              <option value="{{ $item->id }}" @if (old('category') == $item->id) selected @endif>{{ $item->name }}</option>
            @endforeach
          </select>
        </div>
      </div>
    </div>

    <div class="form-row">
      <div class="col-8 mb-3">
        <div class="form-row">
          <div class="col-6 mb-3">
            <label for="audio">{{ __('Audio')}}</label>
            <div>
              <input type="file" 
              class="@error('audio') is-invalid @enderror" 
              id="audio"
              name="audio" 
              placeholder="Audio" 
              value="{{ old('audio') }}" 
              required
              autocomplete="audio" 
              autofocus>
              @error('audio')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          <div class="col-6 mb-3">
            <label for="image">{{ __('Image')}}</label>
            <div> 
              <input type="file" 
              class="@error('image') is-invalid @enderror" 
              id="image"
              name="image" 
              placeholder="Image" 
              autocomplete="image" 
              multiple
              autofocus
              required>
              @error('image')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>
        </div>
        <div class="form-row">
          <div class="col-6 mb-3">
            <audio controls id="audio_preview" style="display:none; max-width"></audio>
          </div>
          <div class="col-6 mb-3">
            <img id="image_preview" class="w-75 h-100" style="display:none; max-height:100px">
          </div>
        </div>
      </div>
      <div class="col-4 mb-3">
        <div class="col-12 mb-3">
          <label for="description">{{ __('Description')}}</label>
          <div>
            <textarea name="description" 
              style="resize:none;"
              id="description" 
              class="form-control @error('description') is-invalid @enderror" 
              placeholder="Description" 
              autocomplete="description" 
              autofocus
              required
              rows="6">{{ old('description') }}
            </textarea>
            @error('description')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>
      </div>
    </div>
      
    <button class="btn btn-primary" type="submit">Submit</button>
</form>

    {{-- <div class="audio-container">
      <div class="audio-column add-bottom">
          <div id="mainwrap">
              <div id="nowPlay">
                  <span id="npAction">Paused...</span><span id="npTitle"></span>
              </div>
              <div id="audiowrap">
                  <div id="audio0">
                      <audio id="audio1" preload controls></audio>
                  </div>
                  <div id="tracks" class="pt-2 ">
                    <a id="btnPrev">&vltri;</a><a id="btnNext">&vrtri;</a>
                  </div>
              </div>
              <div id="plwrap">
                  <ul id="plList"></ul>
              </div>
          </div>
      </div> --}}
     
  </div>
  

</div>
@endsection

@section('script-section')
  <script src="{{ asset('js/image-audioPreview.js') }}"></script>    
  {{-- <script src="{{ asset('js/audio-tag.js') }}"></script>     --}}
  <script src="{{ asset('js/dropdown.js') }}"></script>    

  <script>
   
  </script>
@endsection
