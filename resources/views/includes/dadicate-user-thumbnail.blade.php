<div class="col-12 mb-2">
  <div class="row  align-items-center">
    <div class="col-2"><img src="{{ $userProfile->profileImage() }}" class="w-100 h-auto rounded-circle float-right" alt=""></div>
    <div class="col-8">
      <div class="row">{{ $userProfile->name }}</div>
      <div class="row text-white-50">Type</div>
    </div>
    <div class="col-2">
      <button type="submit" class="float-right rounded-pill btn-sm btn btn-success dadicateButton" id="{{ $userProfile->user->id }}-user">Dadicate</button>
    </div>
  </div>
</div>