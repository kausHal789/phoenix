<div class="col-12 mb-2 notification rounded p-1">
  <div class="row">
    <div class="col ml-2">
      Dedication from <span class="font-weight-bold artistName text-ellipsis text-capitalize" id="{{ $notification->data['user']['id'] }}-user">{{ $notification->data['user']['name'] }}</span>
    </div>
  </div>
  <div class="row align-items-center">
    <div class="col-2 ml-2">
      <img src="/storage/{{ $notification->data['song']['album_image'] }}" class="rounded-circle float-left" alt="" style="max-width: 32px;">
    </div>
    <div class="col-6">
      <div class="row"><div class="col text-ellipsis text-capitalize">{{ $notification->data['song']['title'] }}</div></div>
      <div class="row"><div class="col artistName text-ellipsis text-capitalize" id="{{ $notification->data['song']['artist_id'] }}-user">{{ $notification->data['song']['artist_name'] }}</div></div>
    </div>
    <div class="col-2">
      <img src="/storage/icons/play_button_circled.png" alt="" class="trackPlayButton" id="{{ $notification->data['song']['id'] }}-track">
    </div>
  </div>
</div>