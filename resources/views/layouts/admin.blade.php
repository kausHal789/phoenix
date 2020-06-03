<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}" id="_csrf">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
  <script src="{{ asset('js/jquery-3.4.1.min.js') }}" type="text/javascript"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js" integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe" crossorigin="anonymous"></script>


  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{asset('css/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="{{ asset('css/style.bundle.css') }}">
  <link href="{{asset('css/brand.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('css/brand/brand.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('css/light.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('css/aside/light.css')}}" rel="stylesheet" type="text/css" />

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  @yield('head-section')
</head>
<body
  class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--fixed kt-aside-secondary--enabled kt-page--loading">
  
  <div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
		<div class="kt-header-mobile__logo">
			{{-- <a href="/">
				<img alt="Logo" src="storage/icons/logo.png" />
			</a> --}}
		</div>
		<div class="kt-header-mobile__toolbar">
			<button class="kt-header-mobile__toolbar-toggler kt-header-mobile__toolbar-toggler--left" id="kt_aside_mobile_toggler"><span></span></button>
			<button class="kt-header-mobile__toolbar-toggler" id="kt_header_mobile_toggler"><span></span></button>
			<button class="kt-header-mobile__toolbar-topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more"></i></button>
		</div>
	</div>
  
  <div class="kt-grid kt-grid--hor kt-grid--root">
		<!-- begin:: Page -->
		<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
			<!-- begin:: Aside -->

			<div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop"
				id="kt_aside">
				<!-- begin::Logo -->
				<div class="kt-aside__brand kt-grid__item " id="kt_aside_brand">
					<div class="kt-aside__brand-logo">
						<a href="/home">
							<img alt="Logo" src="/storage/icons/logo.png" />
						</a>
					</div>

					<div class="kt-aside__brand-tools">
						<button class="kt-aside__brand-aside-toggler kt-aside__brand-aside-toggler--left"
							id="kt_aside_toggler"><span></span></button>
					</div>
				</div>
				<!-- end:: Logo -->
				<!-- begin:: Aside Menu -->
				<div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
					<div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1"
						data-ktmenu-dropdown-timeout="500">

						<ul class="kt-menu__nav">

							<li class="kt-menu__section">
								<h4 class="kt-menu__section-text">Advance</h4>
								<i class="kt-menu__section-icon flaticon-more-v2"></i>
							</li>

							<li class="kt-menu__item  kt-menu__item--submenu mt-3 mb-3">
								<a href="/telescope" target="_blank" class="kt-menu__link kt-menu__toggle">
									<img src="/storage/icons/telescope.png" class="mr-2" width="25" alt=""> 
									<span class="kt-menu__link-text">Telescope</span>
								</a>
							</li>
              
							<li class="kt-menu__section">
								<h4 class="kt-menu__section-text">Basic</h4>
								<i class="kt-menu__section-icon flaticon-more-v2"></i>
							</li>
							<li class="kt-menu__item  kt-menu__item--submenu mt-3 mb-3 @if (isset($isAdminHome)) kt-menu__item--active @endif">
                  <a href="{{ route('admin.home') }}" class="kt-menu__link kt-menu__toggle">
                    <img src="/storage/icons/admin_home.png" class="mr-2" width="25" alt=""> 
                    <span class="kt-menu__link-text">Home</span>
                  </a>
							</li>
							<li class="kt-menu__item  kt-menu__item--submenu mt-3 mb-3 @if (isset($isAdminUser)) kt-menu__item--active @endif">
                  <a href="{{ route('admin.user') }}" class="kt-menu__link kt-menu__toggle">
                    <img src="/storage/icons/user_dark.png" class="mr-2" width="25" alt=""> 
                    <span class="kt-menu__link-text">User</span>
                  </a>
							</li>
							<li class="kt-menu__item  kt-menu__item--submenu mt-3 mb-3 @if (isset($isAdminAlbum)) kt-menu__item--active @endif">
                  <a href="{{ route('admin.album') }}" class="kt-menu__link kt-menu__toggle">
                    <img src="/storage/icons/album.png" class="mr-2" width="25" alt=""> 
                    <span class="kt-menu__link-text">Album</span>
                  </a>
							</li>
							<li class="kt-menu__item  kt-menu__item--submenu mt-3 mb-3 @if (isset($isAdminPlaylist)) kt-menu__item--active @endif">
                  <a href="{{ route('admin.playlist') }}" class="kt-menu__link kt-menu__toggle">
                    <img src="/storage/icons/playlist.png" class="mr-2" width="25" alt=""> 
                    <span class="kt-menu__link-text">Playlist</span>
                  </a>
							</li>              
              <li class="kt-menu__item  kt-menu__item--submenu"  aria-haspopup="true"
                data-ktmenu-submenu-toggle="hover">
                  <a href="" class="kt-menu__link kt-menu__toggle">
                    <img src="/storage/icons/song.png" class="mr-2" width="25" alt=""> 
                    <span class="kt-menu__link-text">Track</span>
                    <i class="kt-menu__ver-arrow la la-angle-right"></i>
                  </a>
								<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
									<ul class="kt-menu__subnav">									
                    <li class="kt-menu__item  kt-menu__item--submenu mt-2 @if (isset($isAdminSong)) kt-menu__item--active @endif">
                      <a href="{{ route('admin.song') }}" class="kt-menu__link kt-menu__toggle">
                        <span class="kt-menu__link-text">Song</span>
                      </a>
                    </li>
                    <li class="kt-menu__item  kt-menu__item--submenu @if (isset($isAdminSongCategories)) kt-menu__item--active @endif">
                      <a href="{{ route('admin.song.categories') }}" class="kt-menu__link kt-menu__toggle">
                        <span class="kt-menu__link-text">Category</span>
                      </a>
                    </li>
									</ul>
								</div>
							</li>
							<li class="kt-menu__item  kt-menu__item--submenu mt-3 mb-3 @if (isset($isAdminSubscription)) kt-menu__item--active @endif">
                  <a href="{{ route('admin.subscription') }}" class="kt-menu__link kt-menu__toggle">
                    <img src="/storage/icons/subscription.png" class="mr-2" width="25" alt=""> 
                    <span class="kt-menu__link-text">Subscribers</span>
                  </a>
							</li>
							<li class="kt-menu__item  kt-menu__item--submenu mt-3 mb-3 @if (isset($isAdminFeedback)) kt-menu__item--active @endif">
                  <a href="{{ route('admin.feedback') }}" class="kt-menu__link kt-menu__toggle">
                    <img src="/storage/icons/feedback.png" class="mr-2" width="25" alt=""> 
                    <span class="kt-menu__link-text">Feedback</span>
                  </a>
							</li>
							<li class="kt-menu__item  kt-menu__item--submenu mt-3 mb-3 @if (isset($isAdminPayment)) kt-menu__item--active @endif">
                  <a href="{{ route('admin.payment') }}" class="kt-menu__link kt-menu__toggle">
                    <img src="/storage/icons/payment.png" class="mr-2" width="25" alt=""> 
                    <span class="kt-menu__link-text">Payment</span>
                  </a>
							</li>
							<li class="kt-menu__item  kt-menu__item--submenu mt-3 mb-3 @if (isset($isAdminAdvertisement)) kt-menu__item--active @endif">
                  <a href="{{ route('admin.advertisement') }}" class="kt-menu__link kt-menu__toggle">
                    <img src="/storage/icons/advertisement.png" class="mr-2" width="25" alt=""> 
                    <span class="kt-menu__link-text">Advertisement</span>
                  </a>
							</li>
							<li class="kt-menu__item  kt-menu__item--submenu mt-3 mb-3 @if (isset($isAdminRequest)) kt-menu__item--active @endif">
                  <a href="{{ route('admin.request') }}" class="kt-menu__link kt-menu__toggle">
                    <img src="/storage/icons/request.png" class="mr-2" width="25" alt=""> 
                    <span class="kt-menu__link-text">Claim Requests</span>
                  </a>
							</li>
							<li class="kt-menu__item  kt-menu__item--submenu mt-3 mb-3">
                  <a href="{{ route('logout') }}" class="kt-menu__link kt-menu__toggle" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <img src="/storage/icons/logout.png" class="mr-2" width="25" alt=""> 
                    <span class="kt-menu__link-text">Log Out</span>
									</a>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
											@csrf
									</form>
							</li>
		
						</ul>
					</div>
				</div>
				<!-- end:: Aside Menu -->
			</div>
			<!-- end:: Aside -->
			<!-- begin:: Wrapper -->
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
				<!-- begin:: Header -->
				<div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">

					<!-- begin:: Header Menu -->
					
					<div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">

						<div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout- ">
              @yield('searchBar')
            </div>
					</div>
					<!-- end:: Header Menu -->
					<!-- begin:: Header Topbar -->
					<div class="kt-header__topbar">
						
						<!--begin: User Bar -->
						<div class="kt-header__topbar-item kt-header__topbar-item--user">
							<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
								<div class="kt-header__topbar-user kt-rounded-">
									<span class="kt-header__topbar-welcome kt-hidden-mobile">Hi,</span>
									<span class="kt-header__topbar-username kt-hidden-mobile">{{ auth()->user()->profile->name }}</span>
									<img alt="Pic" src="{{auth()->user()->profile->profileImage()}}" class="kt-rounded" />
								</div>
							</div>
						</div>
						<!--end: User Bar -->
					</div>
					<!-- end:: Header Topbar -->
				</div>
				<!-- end:: Header -->

        <!-- Content part -->
				<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

					<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            {{-- Our Container --}}
            @yield('content')
					</div>
				</div>
        <!-- End -->


        <!-- begin:: Footer -->
        
				{{-- <div class="kt-footer kt-grid__item kt-grid kt-grid--desktop kt-grid--ver-desktop" id="kt_footer">
					<div class="kt-container  kt-container--fluid ">
						<div class="kt-footer__copyright">
							2018&nbsp;&copy;&nbsp;<a href="http://keenthemes.com/keen" target="_blank"
								class="kt-link">Keenthemes Inc</a>
						</div>
						<div class="kt-footer__menu">
							<a href="http://keenthemes.com/keen" target="_blank"
								class="kt-footer__menu-link kt-link">About</a>
							<a href="http://keenthemes.com/keen" target="_blank"
								class="kt-footer__menu-link kt-link">Team</a>
							<a href="http://keenthemes.com/keen" target="_blank"
								class="kt-footer__menu-link kt-link">Contact</a>
						</div>
					</div>
				</div> --}}
        
        <!-- end:: Footer -->
			</div>
			<!-- end:: Wrapper -->

			<!-- begin:: Aside Secondary -->
			<div class="kt-aside-secondary" id="kt_aside_secondary">
				<div class="kt-aside-secondary__toggle" id="kt_aside_secondary_toggler"></div>

				<div class="kt-aside-secondary__content">
					<button class="btn btn-sm btn-circle btn-icon kt-aside-secondary__close"
						id="kt_aside_secondary_close" data-toggle="tooltip" title="Layout Builder"
						data-placement="Events">
						<i class="la la-close"></i>
					</button>
					<div class="tab-content">
						<div class="tab-pane fade " id="kt_aside_secondary_tab_1" role="tabpanel">
							<div class="kt-aside-secondary__content-head">
								Create Advertisement
							</div>
							
							<div class="kt-aside-secondary__content-body kt-scroll">
								<form class="kt-form" action="@if (isset($editadvertisement)) /advertisement/{{ $editadvertisement->id }} @else /advertisement @endif" method="POST" enctype="multipart/form-data">
								{{-- <form class="kt-form" action="/advertisement" method="POST"> --}}
									@csrf
									@if (isset($editadvertisement)) 
										@method('PATCH')
									@endif
									<div class="kt-section kt-section--first">
										<div class="form-group">
											<label for="image">Image:</label>
											<input type="file" id="image" name="image" class="">
											<span class="form-text text-muted">Please select your Advertisement image</span>
											@error('image')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
											@enderror
										</div>
										<div class="form-group">
											<img id="image_preview" @if (isset($editadvertisement))src="/storage/{{ $editadvertisement->image }}"@endif class="w-100 h-100 img-fluid" alt="">
										</div>
										<div class="form-group">
											<label for="title">Title:</label>
											<input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Enter title" 
												value="{{ old('title') ?? $editadvertisement->title ?? '' }}" >
											<span class="form-text text-muted">Please enter your Advertisement name</span>
											@error('title')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
										<div class="form-group">
											<label for="url">Offical link</label>
											<input type="text" id="url" name="url" class="form-control @error('url') is-invalid @enderror" placeholder="Enter link" 
												value="{{ old('url') ?? $editadvertisement->url ?? '' }}">
											<span class="form-text text-muted">Please enter offical link (http://example.com)</span>
											@error('url')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>
									<div class="kt-form__actions">
										<button type="submit" class="btn btn-primary">
											@if (isset($editadvertisement)) 
												Update
											@else
												Create
											@endif
										</button>
										<button type="reset" class="btn btn-secondary">Cancel</button>
									</div>
								</form>
							</div>
						</div>
						
						
					</div>
				</div>

				<div class="kt-aside-secondary__nav kt-grid kt-grid--hor">
					<div class="kt-grid__item kt-grid__item--fluid kt-aside-secondary__nav-body">
						<ul class="kt-aside-secondary__nav-toolbar nav nav-tabs" role="tablist"
							id="kt_aside_secondary_nav">
							<li class="kt-aside-secondary__nav-toolbar-item nav-item " data-toggle="kt-tooltip"
								title="Events" data-placement="left">
								<a class="kt-aside-secondary__nav-toolbar-icon nav-link " data-toggle="tab"
									href="#kt_aside_secondary_tab_1" role="tab" id="advertisementForm">
									<i class="flaticon2-box kt-font-brand"></i>
									<!-- <span class="kt-badge kt-badge--dot kt-badge--md kt-badge--danger"></span> -->
								</a>
							</li>
							
						</ul>
					</div>
					
        </div>
        
			</div>
			<!-- end:: Aside Secondary -->
		</div>
		<!-- end:: Page -->
  </div>


	<script src="{{ asset('js/plugins.bundle.js') }}" type="text/javascript"></script>  
	<script src="{{ asset('js/scripts.bundle.js') }}" type="text/javascript"></script>  
  <div>
    @yield('script-section')
  </div>
  <script>

    $(document).ready(function () {
			$(document).on('click', '.switch', function() {
				var data = $(this).attr('id').split('-', 2);
        var id = data[0];
        var type = data[1];
				
        if ($(this).is(":checked")) { 
            // make deactivate
            var url = "/admin/" + type + "/activate/" + id;
            activate_deactivate(url);
        } else { 
          // make activate
            var url = "/admin/" + type + "/deactivate/" + id;
            activate_deactivate(url);
        } 
			})

			$(document).on('keyup', '.search_box', function() {
				var type = $(this).attr('id');
				var term = $(this).val();
				console.log(term);
				$.ajax({
					url: "/admin/" + type + "/search",
					method: "GET",
					data: {
						term: term
					},
					cache: false,
					success: function (_data) {
						$('#searchTitle').show();
						$('#searchData').html(_data.data);
						// console.log(_data);
					}, 
					error: function (err) {
						console.log(err);
					}
				})
			});
    });

    


    function activate_deactivate(_url) {
      $.ajax({
        url: _url,
        method: "GET",
        cache: false,
        success: function (_data) {
          console.log(_data);
        }, 
        error: function (err) {
          console.log(err);
        }
      })
    }
  </script>
</body>
</html>
