<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<div class="brand" >
					<img style="border-radius: 50%;width: 50px;height: 50px; padding-top: 3px;" src="{{Auth::user()->avatar}}" alt="">
					<a href="#" style="text-decoration: none; color: white;"><span>{{Auth::user()->name}}</span></a>	
				</div>				
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
								<li><a href="{{url('/admin/khachhang/detail')}}/{{Auth::user()->id}}"><i class="halflings-icon user"></i> Profile</a></li>
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