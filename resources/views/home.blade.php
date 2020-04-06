<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ env('APP_NAME') }}</title>

  <meta name="csrf-token" content="{{ csrf_token() }}" id="_csrf">

<title>{{ config('app.name', 'Laravel') }}</title>

<link rel="stylesheet" type="text/css" href="{{ asset('welcome/styles/about.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('welcome/styles/about_responsive.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('welcome/styles/contact.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('welcome/styles/contact_responsive.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('welcome/styles/bootstrap-4.1.2/bootstrap.min.css')}} ">
<link href="{{ asset('welcome/plugins/font-awesome-4.7.0/css/font-awesome.min.css')}} " rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('welcome/plugins/OwlCarousel2-2.2.1/owl.carousel.css')}} ">
<link rel="stylesheet" type="text/css" href="{{ asset('welcome/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}} ">
<link rel="stylesheet" type="text/css" href="{{ asset('welcome/plugins/OwlCarousel2-2.2.1/animate.css')}} ">
<link rel="stylesheet" type="text/css" href="{{ asset('welcome/styles/main_styles.css')}} ">
<link rel="stylesheet" type="text/css" href="{{ asset('welcome/styles/responsive.css')}} ">


</head>
<body>

<div class="super_container">
	

	<header class="header">
		<div class="header_content d-flex flex-row align-items-center justify-content-center">
			<div class="logo"><a href="#home">{{ env('APP_NAME') }}</a></div>
			<div class="log_reg">
				<ul class="d-flex flex-row align-items-start justify-content-start">
					<li><a href="/login">Login</a></li>
					<li><a href="/register">Register</a></li>
				</ul>
			</div>
		</div>
	</header>
	


	<div class="home">
		<div class="home_slider_container">
			
			<!-- Home Slider -->
			<div class="owl-carousel owl-theme home_slider">
				
				<!-- Slide -->
				<div class="owl-item">
					<div class="background_image" style="background-image:url(/storage/img/1920x1080/01.jpg)"></div>
					<div class="home_container">
						<div class="home_container_inner d-flex flex-column align-items-center justify-content-center">
							<div class="home_content text-center">
								<div class="home_subtitle">{{ env('APP_NAME') }}</div>
								<div class="home_title"><h1>Listen to the songs you love.</h1></div>
								<div class="home_link"><a href="#jplayer_1">Listen on Soundcloud</a></div>
							</div>
						</div>
					</div>
				</div>

				<!-- Slide -->
				<div class="owl-item">
					<div class="background_image" style="background-image:url(/storage/img/1920x1080/02.jpg)"></div>
					<div class="home_container">
						<div class="home_container_inner d-flex flex-column align-items-center justify-content-center">
							<div class="home_content text-center">
								<div class="home_subtitle">{{ env('APP_NAME') }}</div>
								<div class="home_title"><h1>Music For Everyone</h1></div>
								<div class="home_link"><a href="#jplayer_1">Listen on Soundcloud</a></div>
							</div>
						</div>
					</div>
				</div>

				<!-- Slide -->
				<div class="owl-item">
					<div class="background_image" style="background-image:url(/storage/img/1920x1080/03.jpg)"></div>
					<div class="home_container">
						<div class="home_container_inner d-flex flex-column align-items-center justify-content-center">
							<div class="home_content text-center">
								<div class="home_subtitle">{{ env('APP_NAME') }}</div>
								<div class="home_title"><h1>Love is all around</h1></div>
								<div class="home_link"><a href="#jplayer_1">Listen on Soundcloud</a></div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>


	<div class="featured_album">
		<div class="background_image featured_background" style="background-image:url(/storage/img/featured.png)"></div>
		<div class="container">
			<div class="row featured_row row-lg-eq-height">

				<div class="col-md-6">
					<div class="featured_album_image">
						<div class="image_overlay"></div>
						<div class="background_image" style="background-image:url(/storage/img/970x970/02.jpg)"></div>
					</div>
				</div>

			</div>
		</div>
	</div>


	<div class="artist">
		<div class="container">
			<div class="row">

				<div class="col-lg-4 artist_image_col">
					<div class="artist_image">
						<img src="storage\img\artist.png" alt="">
					</div>
				</div>

				<div class="col-lg-7 offset-lg-1">
					<div class="artist_content">
						<div class="section_title_container">
							<div class="section_subtitle"></div>
							<div class="section_title"><h1>The Artists</h1></div>
						</div>
						<div class="artist_text">
							<p> A musician is a person who plays a musical instrument or is musically talented.[1] Anyone who composes, conducts, or performs music is referred to as a musician.[2] A musician who plays a musical instrument is also known as an instrumentalist.
								Musicians can specialize in any musical style, and some musicians play in a variety of different styles depending on cultures and background. Examples of a musician's possible skills include performing, conducting, singing, rapping, producing, composing, arranging, and the orchestration of music.</p>
							<p>
								In the Middle Ages, instrumental musicians performed with soft ensembles inside and loud instruments outdoors. Many European musicians of this time catered to the Roman Catholic Church, and they provided arrangements structured around Gregorian chant structure and Masses from church texts.
							</p>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<div class="milestones">
		<div class="milestones_container">
			<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="\storage\img\milestones.jpg" data-speed="0.8"></div>
			<div class="container">
				<div class="row milestones_row justify-content-between">
					
					<div class="col-xl-3 col-md-6 milestone_col">
						<div class="milestone d-flex flex-row align-items-center justify-content-start">
							<div class="milestone_icon"><img src="\storage\icons\icon_1.svg" ></div>
							<div class="milestone_content">
								<div class="milestone_counter" data-end-value="{{ $albumCount }}">0</div>
								<div class="milestone_text">Albums</div>
							</div>
						</div>
					</div>

				
					<!-- Milestone -->
					<div class="col-xl-3 col-md-6 milestone_col">
						<div class="milestone d-flex flex-row align-items-center justify-content-start">
							<div class="milestone_icon"><img src="\storage\icons\icon_3.svg" alt="https://www.flaticon.com/authors/smashicons"></div>
							<div class="milestone_content">
								<div class="milestone_counter" data-end-value="{{ $userCount }}">0</div>
								<div class="milestone_text">Happy Listeners</div>
							</div>
						</div>
					</div>

					<!-- Milestone -->
					<div class="col-xl-3 col-md-6 milestone_col">
						<div class="milestone d-flex flex-row align-items-center justify-content-start">
							<div class="milestone_icon"><img src="\storage\icons\icon_4.svg" alt="https://www.flaticon.com/authors/smashicons"></div>
							<div class="milestone_content">
								<div class="milestone_counter" data-end-value="{{ rand(0, 50) }}">0</div>
								<div class="milestone_text">New Playlist</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

	<div class="contact" id="feedback">
		<div class="container">
			<div class="row">
				
				<!-- Contact Form -->
				<div class="col-lg-6">
					<div class="contact_form_container">
						<div class="contact_title">Send us a message</div>
						<form action="/feedback" class="contact_form" method="POST">
							@csrf
							<input type="text" name="name" value="{{ old('name') }}" class="contact_input @error('name') is-invalid @enderror" placeholder="Name" required="required">
							@error('name')
                <span class="invalid-feedback text-danger" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
							<input type="email" name="email" value="{{ old('email') }}" class="contact_input @error('email') is-invalid @enderror" placeholder="E-mail" required="required">
							@error('email')
								<span class="invalid-feedback text-danger" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
							<input type="text" name="phone" value="{{ old('phone') }}" class="contact_input @error('phone') is-invalid @enderror" placeholder="Phone no">
							@error('phone')
								<span class="invalid-feedback text-danger" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
							<textarea name="description" class="contact_input contact_textarea @error('description') is-invalid @enderror" placeholder="Message" required="required">{{ old('description') }}</textarea>
							@error('description')
								<span class="invalid-feedback text-danger" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
							<button class="contact_button">Send Message</button>
						</form>
					</div>
				</div>

				<!-- Contact Info -->
				<div class="col-lg-6 contact_col">
					<div class="contact_info">
						<div class="contact_title">Where to find us</div>
						<div class="contact_text">
							<p>In vitae nisi aliquam, scelerisque leo a, volutpat sem. Vivamus rutrum dui fermentum eros hendrerit, id lobortis leo volutpat. Maecenas sollicitudin est in libero pretium interdum. Nullam volutpat dui sem, ac congue purus luctus nec. Curabitur luctus luctus erat, sit amet facilisis quam congue quis. Quisque ornare luctus erat id dignissim. Nullam ac nunc quis ex porttitor luctus.</p>
						</div>
						<div class="contact_info_list">
							<ul>
								<li class="d-flex flex-row align-items-start justify-content-start">
									<div><div>Address</div></div>
									<div>1481 Creekside Lane Avila Beach, CA 931</div>
								</li>
								<li class="d-flex flex-row align-items-start justify-content-start">
									<div><div>Phone</div></div>
									<div>+53 345 7953 32453</div>
								</li>
								<li class="d-flex flex-row align-items-start justify-content-start">
									<div><div>E-mail</div></div>
									<div>{{ env('MAIL_FROM_ADDRESS') }}</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<footer class="footer">
		<div class="footer_container d-flex flex-xl-row flex-column align-items-start justify-content-start">
			<div class="newsletter_container">
				<div class="newsletter_title"><h2>Subscribe to our newsletter</h2></div>
				<form action="/subscription" method="POST" id="newsletter_form" class="newsletter_form">
					@csrf
					<input type="email" name="email" class="newsletter_input" placeholder="Your E-mail" required="required">
					<button class="newsletter_button">Subscribe</button>
				</form>
			</div>
			<div class="footer_lists d-flex flex-sm-row  flex-column align-items-start justify-content-start ml-xl-auto">

				<!-- Useful Links -->
				<div class="footer_list">
					<div class="footer_list_title">Links</div>
					<ul>
						<li><a href="{{ route('claim.artist') }}">For Artist</a></li>
						<li><a href="#home">Home</a></li>
						<li><a href="#about">About us</a></li>
						<li><a href="#artist">Top Artist</a></li>
						<li><a href="#event">Events</a></li>
					</ul>
				</div>			

				<!-- Connect -->
				<div class="footer_list">
					<div class="footer_list_title">Connect</div>
					<ul>
						<li><a href="#feedback">Feedback</a></li>
						<li><a href="#contact">Contact</a></li>
					</ul>
				</div>

			</div>
		</div>
		<div class="copyright_bar">
			<span><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
			Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <i class="fa fa-heart-o" aria-hidden="true"></i> <a href="#home">{{ env('APP_NAME') }}</a>
			<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
			</span>
		</div>
	</footer>
</div>

<script src="{{ asset('welcome/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('welcome/styles/bootstrap-4.1.2/popper.js') }}"></script>
<script src="{{ asset('welcome/styles/bootstrap-4.1.2/bootstrap.min.js') }}"></script>
<script src="{{ asset('welcome/plugins/greensock/TweenMax.min.js') }}"></script>
<script src="{{ asset('welcome/plugins/greensock/TimelineMax.min.js') }}"></script>
<script src="{{ asset('welcome/plugins/scrollmagic/ScrollMagic.min.js') }}"></script>
{{-- <script src="{{ asset('welcome/plugins/greensock/animation.gsap.min.js') }}"></script> --}}
<script src="{{ asset('welcome/plugins/greensock/ScrollToPlugin.min.js') }}"></script>
<script src="{{ asset('welcome/plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
{{-- <script src="{{ asset('welcome/plugins/easing/easing.js') }}"></script> --}}
{{-- <script src="{{ asset('welcome/plugins/progressbar/progressbar.min.js') }}"></script> --}}
<script src="{{ asset('welcome/plugins/parallax-js-master/parallax.min.js') }}"></script>
{{-- <script src="{{ asset('welcome/plugins/jPlayer/jquery.jplayer.min.js') }}"></script> --}}
{{-- <script src="{{ asset('welcome/plugins/jPlayer/jplayer.playlist.min.js') }}"></script> --}}
<script src="{{ asset('welcome/js/custom.js') }}"></script>
<script src="{{ asset('welcome/js/about.js') }}"></script>
{{-- <script src="{{ asset('welcome/js/blog.js') }}"></script> --}}
{{-- <script src="{{ asset('welcome/js/contact.js') }}"></script> --}}
{{-- <script src="{{ asset('welcome/js/element.js') }}"></script> --}}
{{-- <script src="{{ asset('welcome/js/single.js') }}"></script> --}}
</body>
</html>