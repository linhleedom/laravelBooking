@extends('partner.master')
@section('title')
Add Image Room
@endsection
@section('script2')
<script>
   
    $(document).ready(function(){
        $('#homestay_id').change(function(){
            var homestay_id = $(this).val();
            if(homestay_id){
                $.ajax({
                    type:"get",
                    url: '../partner/get-homestay/'+homestay_id,
                    success:function(res){       
                        if(res.length !== 0){
                            $("#product_id").empty();
                            $("#product_id").append('<option></option>');
                            $.each(res,function(key,value){
                                $("#product_id").append('<option value="'+key+'">'+value+'</option>');
                            });
                        }else{
                            $("#product_id").empty();
                            $("#districts").append('<option></option>');
                        }
                    }
                });
            }
        });
        $('#product_id').change(function(){
            var product_id = $(this).val();
            if(product_id){
                $.ajax({
                    type:"get",
                    url: '../partner/get-order/'+product_id,
                    success:function(res){       
                        if(res.length !== 0){
                            var calendarEl = document.getElementById('calendar');
                            var calendar = new FullCalendar.Calendar(calendarEl, {
                            headerToolbar: {
                                left: 'prev,next today',
                                center: '',
                                right: 'dayGridMonth'
                            },
                            editable: true,
                            navLinks: true, // can click day/week names to navigate views
                            dayMaxEvents: true, // allow "more" link when too many events
                            events: {
                                    url: '../partner/get-order/'+product_id,
                                    failure: function() {
                                    document.getElementById('script-warning').style.display = 'block'
                                    },
                                    color:'rgba(255, 25, 25, 0.79)',
                                    backgroundColor: 'rgba(255, 25, 25, 0.79)'
                                },
                                loading: function(bool) {
                                    document.getElementById('loading').style.display =
                                    bool ? 'block' : 'none';
                                }
                                });
                            calendar.render();
                        }else{
                            var calendarEl = document.getElementById('calendar');
                            var calendar = new FullCalendar.Calendar(calendarEl, {
                                headerToolbar: {
                                    left: 'prev,next today',
                                    center: 'title',
                                    right: 'dayGridMonth'
                                },
                                editable: true,
                                navLinks: true, // can click day/week names to navigate views
                                dayMaxEvents: true, // allow "more" link when too many events
                            });
                            calendar.render();
                        }
                    }
                });
            }
        });
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth'
            },
            editable: true,
            navLinks: true, // can click day/week names to navigate views
            dayMaxEvents: true, // allow "more" link when too many events
        });
        calendar.render();
    });
</script>
@endsection
@section('main')
    <!--main-->
	<div class="main" role="main">		
		<div class="wrap clearfix">
			<!--main content-->
			<div class="content clearfix">
				<!--breadcrumbs-->
				<nav role="navigation" class="breadcrumbs clearfix">
					<!--crumbs-->
					<ul class="crumbs">
                        <li><a href="{{route('trangchu')}}" title="Home">Home</a></li> 
						<li>Trạng thái phòng</li>
					</ul> 
					<!--//crumbs-->
                </nav>
                <div class="manage">
                    <div class="select_homestay">
                        <label>Chọn Homestay</label>
                        <select name="homestay_id" id="homestay_id">
                            <option value="" selected></option>
                            @foreach($homestayOfUser as $homestayOfUserVal)
                                <option value="{{$homestayOfUserVal->id}}">{{$homestayOfUserVal->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="select_homestay">
                        <label>Chọn phòng</label>
                        <select name="product_id" id="product_id">
                        </select>
                    </div>
				</div> 
				<!--//breadcrumbs-->
				<section class="main_manage">
                    <div id='script-warning'>
                        Sever Error.
                    </div>

                    <div id='loading'>loading...</div>

                    <div id='calendar'></div>
    			</section>
			</div>
			<!--//main content-->
		</div>
	</div>
@endsection