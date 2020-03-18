<div class="col-xl-4 col-lg-6">
  <div class="kt-portlet kt-portlet--height-fluid">
    <div class="kt-portlet__body">
      <div class="kt-widget kt-widget--general-1">
        <div class="kt-media kt-media--lg kt-media--circle">
          <img src=@if ($user->deleted_at) " {{ __('/storage/icons/default_profile.png') }} " @else " {{ $user->profile->profileImage() }} " @endif alt="image">
        </div>

        <div class="kt-widget__wrapper">
          <div class="kt-widget__label">
            <div class="kt-widget__title">
              @if ($user->deleted_at) 
              {{ $user->username }}
              @else 
              {{ $user->profile->name }}
              @endif
            </div>
            <span class="kt-widget__desc">
              {{ $user->role->name }}<br>
              {{ $user->created_at->diffForHumans() }}
            </span>
          </div>
          <div class="kt-widget__toolbar">
            {{-- Block Unblock --}}
            @include('admin.includes.checkBox', ['collection' => $user, 'collectionType' => 'user'])
          </div>
        </div>
      </div>
    </div>
  </div>
</div>