<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="index.html"><span>BOOKING</span></a>					
				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav">
					<ul class="nav pull-right">
						<!-- start: User Dropdown -->
						<li class="dropdown">
							
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white user"></i> {{Auth::user()->name}} 
								<span class="caret"></span>
							</a>
							
							<ul class="dropdown-menu">
								<li class="dropdown-menu-title">
 									<span>Setting</span>
								</li>
								<li><a href="{{url('/admin/khachhang/edit')}}/{{Auth::user()->id}}"><i class="halflings-icon user"></i> Profile</a></li>
								<li><a href="{{url('/admin/logout')}}"><i class="halflings-icon off"></i> Logout</a></li>
							</ul>
							
						</li>
						<!-- end: User Dropdown -->
					</ul>
				</div>
				<!-- end: Header Menu -->
			</div>
		</div>
	</div>