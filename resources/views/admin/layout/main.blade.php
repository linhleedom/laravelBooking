<div class="container-fluid-full">
	<div class="row-fluid">	
			<!-- start: Main Menu -->
			@include('admin.layout.menu')
			<!-- end: Main Menu -->
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>
			<!-- start: Content -->
			@yield('content')
	
			<!-- end: Content -->
	</div>
</div>
<div class="clearfix"></div>