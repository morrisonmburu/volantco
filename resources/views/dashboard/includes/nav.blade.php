<!-- Main navbar -->
<div class="navbar navbar-expand-md navbar-light fixed-top">

	<!-- Header with logos -->
	<div class="navbar-header navbar-dark d-none d-md-flex align-items-md-center">
		<div class="navbar-brand navbar-brand-md">
			<a href="/dashboard" class="d-inline-block">
				<img src="/images/logo.jpg" alt="">
			</a>
			<a style="padding-left: 20px;" href="/dashboard" class="d-inline-block">
				<img src="/images/logo_admin.png" alt="">
			</a>
		</div>

		<div class="navbar-brand navbar-brand-xs">
			<a href="/dashboard" class="d-inline-block">
				<img src="/images/logo.jpg" alt="">
			</a>
		</div>
	</div>
	<!-- /header with logos -->
	
	<!-- Mobile controls -->
	<div class="d-flex flex-1 d-md-none">
		<div class="navbar-brand mr-auto">
			<a href="/dashboard" class="d-inline-block">
				<img src="/images/logo.jpg" alt="">
				VOLANT LTD
			</a>
		</div>	

		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
			<i class="icon-tree5"></i>
		</button>

		<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
			<i class="icon-paragraph-justify3"></i>
		</button>
	</div>
	<!-- /mobile controls -->


	<!-- Navbar content -->
	<div class="collapse navbar-collapse" id="navbar-mobile">
		<ul class="navbar-nav">
			<li class="nav-item">
				<a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
					<i class="icon-paragraph-justify3"></i>
				</a>
			</li>
		</ul>

		<span class="badge badge-warning badge-pill"><span id="unassign"></span> orders Unassigned</span>
		<span class="badge badge-info badge-pill ml-md-3"><span id="pick"></span> orders Picked Up</span>
		<span class="badge badge-success badge-pill ml-md-3 mr-md-auto"><span id="intrans"></span> orders In Transit</span>

		<ul class="navbar-nav">
			<li class="nav-item dropdown">
				<a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
					<img src="/images/ke.png" class="img-flag mr-2" alt="">
					Kenyan
				</a>
			</li>

			<li class="nav-item dropdown">
				<a href="#" class="navbar-nav-link dropdown-toggle caret-0" data-toggle="dropdown">
					<i class="icon-bubbles4"></i>
					<span class="d-md-none ml-2">Messages</span>
					<span class="badge badge-mark border-pink-400 ml-auto ml-md-0"></span>
				</a>
			</li>

			<li class="nav-item dropdown dropdown-user">
					<a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
						<img src="/images/logo.jpg" class="rounded-circle mr-2" height="34" alt="">
						<span>Volant Ltd</span>
					</a>

					<div class="dropdown-menu dropdown-menu-right">
						<a href="#" class="dropdown-item"><i class="icon-comment-discussion"></i> Messages <span class="badge badge-pill bg-indigo-400 ml-auto">58</span></a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item"><i class="icon-cog5"></i> Account settings</a>
						<a href="{{ route('logout') }}"
						onclick="event.preventDefault();
						document.getElementById('logout-form').submit();" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							@csrf
						</form>
					</div>
				</li>
			</ul>
		</div>
		<!-- /navbar content -->
		
</div>
<style type="text/css">
	.space_top{
		margin-top:40px;
	}

	@media only screen and (max-width: 640px) {
		.space_top{
			margin-top: 30px;
		}
	}
</style>
<!-- /main navbar -->
<div class="space_top"></div>
<!-- Page content -->
<div class="page-content">

<!-- Main sidebar -->
<div class="sidebar sidebar-dark sidebar-main sidebar-fixed sidebar-expand-md">

	<!-- Sidebar mobile toggler -->
	<div class="sidebar-mobile-toggler text-center">
		<a href="#" class="sidebar-mobile-main-toggle">
			<i class="icon-arrow-left8"></i>
		</a>
		Main Navigation
		<a href="#" class="sidebar-mobile-expand">
			<i class="icon-screen-full"></i>
			<i class="icon-screen-normal"></i>
		</a>
	</div>
	<!-- /sidebar mobile toggler -->


	<!-- Sidebar content -->
	<div class="sidebar-content">

		<!-- User menu -->
		<div class="sidebar-user">
			<div class="card-body">
				<div class="media">
					<div class="mr-3">
						<a href="/dashboard"><img src="/images/logo.jpg" width="38" height="38" class="rounded-circle" alt=""></a>
					</div>

					<div class="media-body">
						<div class="media-title font-weight-semibold">Volant Ltd</div>
						<div class="font-size-xs opacity-50">
							<i class="icon-pin font-size-sm"></i> &nbsp;Prosperity House, Westlands
						</div>
					</div>

					<div class="ml-3 align-self-center">
						<a href="#" class="text-white"><i class="icon-cog3"></i></a>
					</div>
				</div>
			</div>
		</div>
		<!-- /user menu -->


		<!-- Main navigation -->
		<div class="card card-sidebar-mobile">
			<ul class="nav nav-sidebar" data-nav-type="accordion">

				<!-- Main -->
				<li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i></li>
				<li class="nav-item {{ (Route::is('dashboard') ? 'nav-item active' : '') }}">
					<a href="/dashboard" class="nav-link">
						<i class="icon-home4"></i>
						<span>
							Dashboard
						</span>
					</a>
				</li>

				<li class="nav-item {{ (Route::is('orders') ? 'nav-item active' : '') }}">
					<a href="/orders" class="nav-link">
						<i class="icon-cart"></i>
						<span>
							Orders
						</span>
					</a>
				</li>

				<li class="nav-item {{ (Route::is('courier') ? 'nav-item active' : '') }}">
					<a href="/courier" class="nav-link">
						<i class="icon-truck"></i>
						<span>
							Associates
						</span>
					</a>
				</li>

				<li class="nav-item {{ (Route::is('operators') ? 'nav-item active' : '') }}">
					<a href="/operators" class="nav-link">
						<i class="icon-user-lock"></i>
						<span>
							Operators
						</span>
					</a>
				</li>

				<li class="nav-item {{ (Route::is('customers') ? 'nav-item active' : '') }}">
					<a href="/customers" class="nav-link">
						<i class="icon-users4"></i>
						<span>
							Customers
						</span>
					</a>
				</li>

				<li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Extra Info</div> <i class="icon-menu" title="Layout options"></i></li>

				<li class="nav-item {{ (Route::is('volant_pricings') ? 'nav-item active' : '') }}">
					<a href="/volant_pricings" class="nav-link">
						<i class="icon-cash"></i>
						<span>
							Volant Pricings
						</span>
					</a>
				</li>

				<li class="nav-item nav-item-submenu">
					<a href="#" class="nav-link"><i class="icon-credit-card2"></i> <span>Payments</span></a>

					<ul class="nav nav-group-sub" data-submenu-title="Payments">
						<li class="nav-item {{ (Route::is('order_payments') ? 'nav-item active' : '') }}"><a href="/order_payments" class="nav-link"><i class="icon-cash"></i><span>Order Payments</span></a></li>
						
						<li class="nav-item {{ (Route::is('payment_types') ? 'nav-item active' : '') }}"><a href="/payment_types" class="nav-link"><i class="icon-coins"></i><span>Payment Types</span></a></li>
					</ul>
				</li>

				<li class="nav-item nav-item-submenu">
					<a href="#" class="nav-link"><i class="icon-stack"></i> <span>Company Extra Datatables</span></a>

					<ul class="nav nav-group-sub" data-submenu-title="Extra Datatables">
						<li class="nav-item {{ (Route::is('account_types') ? 'nav-item active' : '') }}"><a href="/account_types" class="nav-link"><i class="icon-users4"></i><span>User Account Types</span></a></li>

						<li class="nav-item {{ (Route::is('categories') ? 'nav-item active' : '') }}"><a href="/categories" class="nav-link"><i class="icon-cabinet"></i><span>Volant Categories</span></a></li>
						
						<li class="nav-item {{ (Route::is('package_sizes') ? 'nav-item active' : '') }}"><a href="/package_sizes" class="nav-link"><i class="icon-package"></i><span>Package Sizes</span></a></li>

						<li class="nav-item {{ (Route::is('truck_types') ? 'nav-item active' : '') }}"><a href="/truck_types" class="nav-link"><i class="icon-truck"></i><span>Truck Types</span></a></li>

						<li class="nav-item {{ (Route::is('user_roles') ? 'nav-item active' : '') }}"><a href="/user_roles" class="nav-link"><i class="icon-user-tie"></i><span>User Roles</span></a></li>
					</ul>
				</li>

			</ul>
		</div>
		<!-- /main navigation -->

	</div>
	<!-- /sidebar content -->

</div>
<!-- /main sidebar -->


<!-- Main content -->
<div class="content-wrapper">

	<!-- Page header -->
	<div class="page-header">
		<div class="page-header-content header-elements-md-inline">
			<div class="page-title d-flex">
				<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Dashboard</h4>
				<a href="dashboard" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			</div>

			<div class="header-elements d-none text-center text-md-left mb-3 mb-md-0">
				<div class="btn-group">
					<button type="button" class="btn bg-indigo-400"><i class="icon-stack2 mr-2"></i> Admin Options </button>
					<button type="button" class="btn bg-indigo-400 dropdown-toggle" data-toggle="dropdown"></button>
					<div class="dropdown-menu dropdown-menu-right">
						<div class="dropdown-header">Actions</div>
						<li><a href="#" class="dropdown-item"><i class="icon-user-lock"></i> Account security</a></li>
						<li><a href="#" class="dropdown-item"><i class="icon-statistics"></i> Analytics</a></li>
						<li><a href="/permissions" class="dropdown-item"><i class="icon-user-lock"></i> Operator Permissions</a></li>
						<li><a href="/roles" class="dropdown-item"><i class="icon-user-lock"></i> Operator Roles</a></li>
						<li class="divider"></li>
						<li><a href="#" class="dropdown-item"><i class="icon-gear"></i> All settings</a></li>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /page header -->

	<script type="text/javascript">
		$(document).ready(function(){
			jQuery.ajax({
		      url:'{{ route('getOrderStatus') }}',
		      method:"POST",
		      data:{_token: '{{csrf_token()}}'},
		      success:function(result)
		      {
		        $('#unassign').text(result.unassigned)
		        $('#pick').text(result.picked_up)
		        $('#intrans').text(result.in_transit)
		      },
		      error : function(){alert("Something Went Wrong.");},
		    });
		})
	</script>

