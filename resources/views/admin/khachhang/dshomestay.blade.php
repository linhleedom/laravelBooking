@extends('admin.layout.index')
@section('content')
	<div id="content" class="span10">
		<ul class="breadcrumb">
			<li>
				<i class="icon-home"></i>
				<a href="index.html">Home</a> 
				<i class="icon-angle-right"></i>
			</li>
			<li><a href="dshomestay.html">DS Home Stay</a></li>
		</ul>
		<div class="row-fluid sortable">		
			<div class="box span12">
				<div class="box-header" data-original-title>
					<h2><i class="halflings-icon white user"></i><span class="break"></span>Tên Chủ Home Stay</h2>
					<div class="box-icon">
						<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
						<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
						<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
					</div>
				</div>
				<div class="box-content">
					<table class="table table-striped table-bordered bootstrap-datatable datatable">
						<thead>
							<tr>
								<th>Tên Home Stay</th>
								<th>Giá</th>
								<th>Ngày Đăng</th>
								<th>Địa Chỉ</th>
								<th>Hoạt Động</th>
							</tr>
						</thead>   
						<tbody>
							<tr>
								<td class="center">Nam Định</td>
								<td class="center">200000</td>
								<td class="center">2012/01/01</td>
								<td class="center">Nma Định</td>
								<td class="center">
									<a href="detail.html" class="btn btn-success">Detail</a>
									<a class="btn btn-info" href="detail.html">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="#">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr> 
						</tbody>
					</table>            
				</div>
			</div>
		</div>
	</div>
@endsection