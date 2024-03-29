@extends('layouts.app')

@section('content')
<div id="wrapper">
	<div class="main-content">
		<div class="row">
			<div class="col-md-3">
				<a href="#" data-toggle="modal" data-target="#add-category" class="btn btn-lg btn-success btn-block waves-effect waves-light">
					<i class="fa fa-plus"></i> Create New
				</a>
				<div id="external-events" class="margin-top-30">
					<p>Drag and drop your event or click in the calendar</p>
					<div class="fc-event bg-success">My Event One</div>
					<!-- /.fc-event bg-success -->
					<div class="fc-event bg-info">My Event Two</div>
					<!-- /.fc-event bg-info -->
					<div class="fc-event bg-orange">My Event Three</div>
					<!-- /.fc-event bg-orange -->
					<div class="fc-event bg-inverse">My Event Four</div>
					<!-- /.fc-event bg-info -->
					<div class="checkbox margin-top-30">
						<input id="drop-remove" type="checkbox">
						<label for="drop-remove">Remove after drop</label>
					</div>
				</div>
				<!-- /#external-events.margin-top-20 -->
			</div>
			<!-- /.col-md-3 -->
			<div class="col-md-9">
				<div class="box-content">
					<div id="calendar"></div>
					<!-- /#calendar -->
				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-md-9 -->
		</div>
		<!-- /.row -->
		<footer class="footer">
			<ul class="list-inline">
				<li>2016 © NinjaAdmin.</li>
				<li><a href="#">Privacy</a></li>
				<li><a href="#">Terms</a></li>
				<li><a href="#">Help</a></li>
			</ul>
		</footer>
	</div>
	<!-- /.main-content -->
</div>
@endsection
