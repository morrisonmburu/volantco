
	<div class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="index">VOLANT LTD</a>

			<ul class="nav navbar-nav visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
				<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<p class="navbar-text"><span class="label bg-success">Online</span></p>

			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown language-switch">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<img src="assets/images/flags/gb.png" class="position-left" alt="">
						English
						<span class="caret"></span>
					</a>

					<ul class="dropdown-menu">
						
						<li><a class="english"><img src="assets/images/flags/gb.png" alt=""> English</a></li>
					</ul>
				</li>

				<li>
					<a onclick="toggleScreen()" class="nav-link-expand"><i style="font-size: 20px;" class="iconify" id="icon" data-icon="feather:maximize" data-inline="false"></i></a>
				</li>

				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<img src="/images/logo.jpg" alt="">
						<span>{{-- {{ Auth::user()->name }} --}}</span>
						<i class="caret"></i>
					</a>

					<ul class="dropdown-menu dropdown-menu-right">
						{{-- <li><a href="#"><i class="icon-user-plus"></i> My profile</a></li> --}}
						{{-- <li><a href="#"><i class="icon-coins"></i> My balance</a></li> --}}
						<li><a href="#"><span class="badge bg-teal-400 pull-right">58</span> <i class="icon-comment-discussion"></i> Messages</a></li>
						<li class="divider"></li>
						{{-- <li><a href="#"><i class="icon-cog5"></i> Account settings</a></li> --}}
						<li><a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="icon-switch2"></i> Logout</a>                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->
	<div class="content" style="padding-left: 0;">