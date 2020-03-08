@extends('layouts.app')

@section('head-section')
  <link href="{{ asset('css/dropdown.css') }}" rel="stylesheet">  
@endsection

@section('content')
<div class="container">

  @if (isset($isEditSong) == false)
    <div class="row m-5 h1">Add a song in {{ $album->name }}</div>
    @includeIf('includes.album', ['album' => $album])
  @endif 

  <div class="row d-block mt-5">
    <form class="" action=@if (isset($isEditSong))" {{ route('song.update', $song->id) }} " @else "{{ route('song.store') }}" @endif 
      method="POST" 
      @if (isset($isEditSong) == false)
      enctype="multipart/form-data"
      @endif
      >
      @csrf
      @if (isset($isEditSong))
        @method('PATCH')
      @else
        <input type="hidden" name="album_id" id="album_id" value="{{ $album->id }}">
      @endif
      <div class="form-row mb-3">
        <div class="col-6">
          <label for="title">{{ __('Title')}}</label>
          <input 
              type="text" 
              class="form-control @error('title') is-invalid @enderror" 
              id="title" 
              name="title"
              placeholder="Title" 
              value="{{ old('title') ?? $song->title ?? '' }}"
              required
              autocomplete="title" 
              autofocus>
            @error('title')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
        </div>
        <div class="col-6">
          <label for="source">{{ __('Source')}}</label>
          <input 
              type="text" 
              class="form-control @error('source') is-invalid @enderror" 
              id="source" 
              name="source"
              placeholder="Source" 
              value="{{ old('source') ?? $song->source ?? '' }}"
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
  
      <div class="form-row mb-3">
        <div class="col-2">
          <label for="category">{{ __('Category')}}</label>
          <div class="drop-down">
            <select name="category" id="category" class="data-menu" data-menu>
              <option>{{ __('Category') }}</option>
              @foreach ($categories as $item)
              @if (isset($isEditSong))
                <option value="{{ $item->id }}" @if (old('category') == $item->id || $song->category_id == $item->id) selected @endif>{{ $item->name }}</option>
              @else
                <option value="{{ $item->id }}" @if (old('category') == $item->id ) selected @endif>{{ $item->name }}</option>
              @endif
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-6">
          <label for="writer">{{ __('Writer')}}</label>
          <input type="text" 
            class="form-control @error('writer') is-invalid @enderror" 
            id="writer"
            name="writer" 
            placeholder="Writer" 
            value="{{ old('writer') ?? $song->writer ?? '' }}" 
            required
            autocomplete="writer" 
            autofocus>
          @error('writer')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
        <div class="col-4">
          <label for="producer">{{ __('Producer')}}</label>
          <input type="text" 
            class="form-control @error('producer') is-invalid @enderror" 
            id="producer"
            name="producer" 
            placeholder="Producer" 
            value="{{ old('producer') ?? $song->producer ?? '' }}" 
            required
            autocomplete="producer" 
            autofocus>
          @error('producer')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
      </div>

      @if (isset($isEditSong))

      <div class="row">
        <div class="col-4 alert alert-warning">
          <span class="font-weight-bold mr-3">Note:</span> You can not change audio file.
        </div>
      </div>
      
      @else
      
      <div class="form-row mb-4">
        <div class="col-8">
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
            <div class="col-6 mt-3">
              <audio controls id="audio_preview" style="display:none; max-width"></audio>
            </div>
          </div>
        </div>  
      </div>
      
      @endif
       
      <div class="form-row">
        <div class="col text-center">
          <button class="btn btn-block rounded-pill btn-primary" type="submit" >Save & Continue</button>
        </div>
        @if (isset($isEditSong))
        <div class="col text-center">
          <button class="btn btn-block rounded-pill btn-danger" type="submit" onclick="event.preventDefault();
          document.getElementById('song-delete-form').submit();">Delete</button>
        </div>
        @endif
      </div>

  </form>
  @if (isset($isEditSong))
  <form id="song-delete-form" action="{{ route('song.delete', $song->id) }}" method="post">
    @csrf
    @method('DELETE')
  </form>
  @endif
  </div>
  </div>
</div>

@includeIf('album.delete')
{{-- @includeIf('song.delete') --}}
{{-- @includeIf('includes.uploading-spinner') --}}

@endsection

@section('script-section')
  {{-- <script src="{{ asset('js/image-audioPreview.js') }}"></script>     --}}
  <script src="{{ asset('js/dropdown.js') }}"></script>    
@endsection
