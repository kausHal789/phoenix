<div id="album-{{ $album->id }}" class="mb-3">
  <div class="row">
    <div class="col-2 col-sm-4 col-xl-2 col-md-4">
      <img src="/storage/{{ $album->img_url }}" class="img-fluid h-100 w-100" alt="Album Image">
    </div>
    <div class="col-6 ml-2 col-sm-6 col-xl-8 pl-0" style="flex-direction: row;">
      <div class="row"><p>{{ date('Y', strtotime($album->created_at)) }}</p></div>
      <div class="row">
        <div class="album_name h2">{{ $album->name }}</div>
      </div>
      <div class="row align-items-center">
        <div class="col">
          @can('view', App\Artist::class)
          @if (!isset($isSongUploadPage))
            <div class="row">
              <a href="/song/album/{{ $album->id }}">
              <button class="btn btn-sm btn-outline-secondary rounded add-song-btn font-weight-bold" 
                type="button" id="addSongBtn" title="ADD SONG" data-toggle="modal" data-target="#addSongModal">
                ADD SONG INTO THIS ALBUM
              </button>
              </a>
            </div>
          @endif
          @endcan
        </div>
        <div class="col">
          @can('view', App\Artist::class)
          <button  title="Edit Album" class="edit btn album_edit_btn" id="{{ $album->id }}-{{ $album->name }}">
            <img src="/storage/icons/edit.png" alt="Edit">
          </button>
          @endcan
        </div>
        <div class="col">
          @can('view', App\Artist::class)
          @if (isset($isSongUploadPage))
            <form action="/artist/dashboard" method="POST" id="deleteAlbumForm">
              @method("DELETE")
              @csrf
              <input type="hidden" name="album_id" value="{{ $album->id }}">
              <button type="submit" style="display:none" id="deleteAlbumButton" value="true"></button>
            </form>
          @endif
          
          <button title="Delete Album" class="album_delete_btn delete_button btn" id="{{ $album->id }}-{{ $album->name }}" data-toggle="modal" data-target="#deleteAlbumModal">
            <img src="/storage/icons/remove.png" alt="Delete">
          </button>
          @endcan
        </div>
      </div>      
    </div>
  </div>
  @if (count($album->songs) !== 0)
    @includeIf('includes.songs-header')
    @php($cnt = 0)
    @foreach ($album->songs as $song)
      {{-- @php($cnt++) --}}
      @includeIf('includes.song', ['song' => $song, 'cnt' => $cnt++])
    @endforeach
  @endif
</div>