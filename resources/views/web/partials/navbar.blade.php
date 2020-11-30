@if(request()->is("es") || request()->is("en"))

<header id="header">
	<div class="container-fluid">

		<div id="logo" class="pull-left">
			<h1><a href="{{ route('home', ['lang' => $lang]) }}">LOGO</a></h1>
			<!-- <a href="#intro"><img src="img/logo.png" alt="" title="" /></a>-->
		</div>

		<nav id="nav-menu-container">
			<ul class="nav-menu">
				<li class="menu-active"><a href="{{ route('home', ['lang' => $lang]) }}">@lang('messages.home')</a></li>
				<li><a href="{{ route('home', ['lang' => $lang]) }}#about">@lang('messages.about')</a></li>
				<li><a href="{{ route('home', ['lang' => $lang]) }}#excursions">@lang('messages.excursions')</a></li>
				<li><a href="{{ route('home', ['lang' => $lang]) }}#gallery">@lang('messages.gallery')</a></li>
				<li><a href="{{ route('home', ['lang' => $lang]) }}#contact">@lang('messages.contacts')</a></li>
				<li class="menu-has-children"><a href="javascript:void(0);">@if($lang=="es")@lang('messages.spanish')@else@lang('messages.english')@endif</a>
					<ul>
						<li><a class="text-uppercase" href="{{ route('home', ['lang' => 'es']) }}">@lang('messages.spanish')</a></li>
						<li><a class="text-uppercase" href="{{ route('home', ['lang' => 'en']) }}">@lang('messages.english')</a></li>
					</ul>
				</li>
			</ul>
		</nav>
	</div>
</header>

@else

<header class="navbar-fixed header-fixed-top bg-black" id="header">
	<div class="container-fluid">

		<div id="logo" class="pull-left">
			<h1><a href="{{ route('home', ['lang' => $lang]) }}">LOGO</a></h1>
			<!-- <a href="#intro"><img src="img/logo.png" alt="" title="" /></a>-->
		</div>

		<nav id="nav-menu-container">
			<ul class="nav-menu">
				<li class="menu-active"><a href="{{ route('home', ['lang' => $lang]) }}">@lang('messages.home')</a></li>
				<li><a href="{{ route('home', ['lang' => $lang]) }}#about">@lang('messages.about')</a></li>
				<li><a href="{{ route('home', ['lang' => $lang]) }}#excursions">@lang('messages.excursions')</a></li>
				<li><a href="{{ route('home', ['lang' => $lang]) }}#gallery">@lang('messages.gallery')</a></li>
				<li><a href="{{ route('home', ['lang' => $lang]) }}#contact">@lang('messages.contacts')</a></li>
				<li class="menu-has-children"><a href="javascript:void(0);">@if($lang=="es")@lang('messages.spanish')@else@lang('messages.english')@endif</a>
					<ul>
						<li><a class="text-uppercase" href="{{ route('home', ['lang' => 'es']) }}">@lang('messages.spanish')</a></li>
						<li><a class="text-uppercase" href="{{ route('home', ['lang' => 'en']) }}">@lang('messages.english')</a></li>
					</ul>
				</li>
			</ul>
		</nav>
	</div>
</header>

@endif