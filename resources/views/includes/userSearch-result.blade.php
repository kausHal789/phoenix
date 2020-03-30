
@foreach ($users as $user)
    
<div class="col-12 mb-2">
  <div class="row  align-items-center">
    <div class="col-2"><img src="{{ $user->profile->profileImage() }}" class="w-100 h-auto rounded-circle float-right" alt=""></div>
    <div class="col-8">
      <div class="row text-capitalize">{{ $user->profile->name }}</div>
      <div class="row text-white-50">
        User
      </div>
    </div>
    <div class="col-2">
      <a href="/claim/profile/{{ $user->id }}/artist">
        <button class="btn" title="next"><img src="/storage/icons/right_arrow.png" alt="next"></button>
      </a>
    </div>
  </div>
</div>

@endforeach
