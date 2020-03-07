<div class="container-fluid pt-5">

  {{-- <div class="row">
    <div class="col text-center h3">Setting</div>
  </div> --}}


  <div class="row">
    <div class="col text-center">
      <div class="alert mt-3" id="message" style="display: none">Errors</div> 
    </div>
  </div>

  <form action="javascript:void(0)" method="POST" id="updateProfile" class="m-5" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <input type="hidden" name="user_id" id="user_id" value="{{ auth()->id() }}">
    <div class="row">
      <div class="col text-center">
        <label for="name" class="h3 d-block">Name</label>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <input type="text" name="name" id="name"
        class="updateProfileInput d-block @error('audio') is-invalid @enderror" 
            placeholder="Your Name" 
            value="{{ $user->profile->name ??  old('name') }}" 
            required
            autocomplete="name" 
            autofocus>
            @error('name')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
      </div>
    </div>

    <div class="row pt-5 align-items-center">
      <div class="col-6 d-block">
        <label for="profileImage" class="h3 ">Profile Image</label>
        <input type="file" class="ml-3" name="profileImage" id="profileImage">
      </div>
      <div class="col-6 d-block">
        <label for="coverImage" class="h3">Cover Image</label>
        <input type="file" class="ml-3" name="coverImage" id="coverImage">
      </div>
    </div>
    
    <div class="row pt-5 align-items-center">
      <div class="col-6">
        <img src="{{ $user->profile->profileImage() }}" id="profile_image_preview" class="w-50 h-100 img" style="display:none;">
      </div>
      <div class="col-6">
        <img src="{{ $user->profile->profileImage() }}" id="cover_image_preview" class="w-50 h-100 img" style="display:none;">
      </div>
    </div>

    <div class="row pt-5">
      <div class="col-5"></div>
      <div class="col-2">
        <button type="submit" class="btn btn-block rounded-pill saveProfile btn-success">Save</button>
      </div>
    </div>

  </form>

</div>
