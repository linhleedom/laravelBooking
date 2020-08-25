<div id="sidebar-left" class="span2">
	<div class="nav-collapse sidebar-nav">
		<ul class="nav nav-tabs nav-stacked main-menu">
			<li><a href="{{url('/admin/dashboard')}}"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Dashboard</span></a></li>	
			<li><a href="{{url('/admin/thembai')}}"><i class="icon-edit"></i><span class="hidden-tablet"> Thêm Bài Viết</span></a></li>
			<li><a href="{{url('/admin/themslide')}}"><i class="icon-edit"></i><span class="hidden-tablet"> Thêm Slide</span></a></li>
			<li>
				<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet">Quản Lí Slide/Bài Viết/HomeStay </span><span class="label label-important">3</span></a>
				<ul>
					<li>
						<a class="submenu" href="{{url('/admin/QLSlide/danhsach')}}"><i class="icon-file-alt"></i><span class="hidden-tablet">Quản Lí Slide</span></a>
					</li>
					<li>
						<a class="submenu" href="{{url('/admin/QLBlog/danhsach')}}"><i class="icon-file-alt"></i><span class="hidden-tablet">Quản Lí Bài Viết</span></a>
					</li>
					<li>
						<a class="submenu" href="{{url('/admin/homestay/ListHT')}}"><i class="icon-file-alt"></i><span class="hidden-tablet">List Home Stay</span></a>
					</li>
				</ul>	
			</li>
			<li><a href="{{url('/admin/booking/danhsach')}}"><i class="icon-list-alt"></i><span class="hidden-tablet">Booking</span></a></li>
			<li><a href="{{url('/admin/khachhang/danhsach')}}"><i class="icon-bar-chart"></i><span class="hidden-tablet">Users</span></a></li>
			
			<li><a href="{{url('/admin/logout')}}"><i class="icon-lock"></i><span class="hidden-tablet"> Đăng Nhập/Đăng Xuất</span></a></li>
		</ul>
	</div>
</div>