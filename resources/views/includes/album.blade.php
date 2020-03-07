<div id="album-{{ $album->id }}" class="mb-3">
  <div class="row">
    <div class="col-2">
      <img src="/storage/{{ $album->img_url }}" class="img-fluid h-100 w-100" alt="Album Image">
    </div>
    <div class="ml-4 col-6 pl-0" style="flex-direction: row;">
      <div class="row"><p>{{ date('Y', strtotime($album->created_at)) }}</p></div>
      <div class="row h1">
        <h1 class="album_name">{{ $album->name }}</h1>
        <div class="ml-3">
          @can('view', App\Artist::class)
          <button  title="Edit Album" class="edit btn album_edit_btn" id="{{ $album->id }}-{{ $album->name }}">
            <img src="/storage/icons/edit.png" alt="Edit">
          </button>
          @endcan
        </div>
      </div>
      @can('view', App\Artist::class)
      @if (!isset($isSongUploadPage))
        <div class="row">
          <a href="/artist/song/{{ $album->id }}">
          <button class="btn btn-sm rounded add-song-btn font-weight-bold" 
            type="button" id="addSongBtn" title="ADD SONG" data-toggle="modal" data-target="#addSongModal">
            ADD NEW SONG TO THIS ALBUM
            <i class="fas fa-plus-circle float-right add-icon" data-toggle="modal" data-target="#addSongModal" style="padding-top: 5px;" title="ADD SONG"></i>
          </button>
          </a>
        </div>
      @endif
      @endcan
    </div>
    <div class="col-2">
      <div class="float-right">
        <div  class="m-5 h1">
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
      @php($cnt++)
      @includeIf('includes.song', ['song' => $song, 'cnt' => $cnt])
    @endforeach
  @endif
</div>