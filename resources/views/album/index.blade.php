<h1 class="heading font-weight-bold" style="">You Might Also Like</h1>
    
<div id="albumContainer">  
<div class="row">
  @foreach ($albums as $album)
    @include('includes.album-thumbnail', ['album' => $album])
  @endforeach
</div>
</div>