<div class="col-6 mb-2">
  <div class="row  align-items-center">
    <div class="col-2"><img src="{{ $user->profile->profileImage() }}" class="w-100 h-auto rounded-circle float-right" alt=""></div>
    <div class="col-8">
      <div class="row artistName" id="{{ $user->id }}-user">{{ $user->profile->name }}</div>
      <div class="row text-white-50">{{ $userType }}</div>
    </div>
  </div>
</div>