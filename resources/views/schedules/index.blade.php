<?php use Carbon\Carbon; ?>
@extends('layouts/main')

@section('breadcrumb')
<ul class="breadcrumb">
    <li class="active">Schedules</li>
</ul>
@stop

@section('nav-schedules') active @stop

@section('page-content-wrapper')
<div class="page-content-wrap"> 
 <!-- START PANEL WITH CONTROL CLASSES -->
<div class="panel panel-warning">
	<div class="panel-heading">
		<h3 class="panel-title">Add schedule here.</h3>
		<ul class="panel-controls">
			<li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
		</ul>                                
	</div>
	<div class="panel-body">
		<form class="form-teacher form-horizontal">
			{{ csrf_field() }}                                  
			<div class="panel-body form-group-separated">
				<div class="form-group">
					<label class="col-md-3 col-xs-12 control-label">Section</label>
					<div class="col-md-6 col-xs-12">                                            
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-tag"></span></span>
							<select class="form-control" name="select-section" id="select-section">
								<option>Rizal</option>
							</select>
						</div>                                            
					</div>
				</div>
				
				<div class="form-group">                                        
					<label class="col-md-3 col-xs-12 control-label">Teacher</label>
					<div class="col-md-6 col-xs-12">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-user"></span></span>
							<select class="form-control" name="select-teacher" id="select-teacher">
								<option>Erik San Diosebas</option>
							</select>
						</div>            
					</div>
				</div>
				
				<div class="form-group">                                        
					<label class="col-md-3 col-xs-12 control-label">Subject</label>
					<div class="col-md-6 col-xs-12">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-book"></span></span>
							<select class="form-control" name="select-subject" id="select-subject">
								<option>Filipino</option>
							</select>                                            
						</div>
					</div>
				</div>

				<div class="form-group">                                        
					<label class="col-md-3 col-xs-12 control-label">Start Time</label>
					<div class="col-md-6 col-xs-12">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-info"></span></span>
							<input type="text" class="form-control timepicker" name="start-time" id="start-time"/>                                            
						</div>
					</div>
				</div>

				<div class="form-group">                                        
					<label class="col-md-3 col-xs-12 control-label">End Time</label>
					<div class="col-md-6 col-xs-12">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-info"></span></span>
							<input type="text" class="form-control timepicker" name="end-time" id="end-time"/>                                            
						</div>
					</div>
				</div>
			</div>
        </form>
	</div>      
	<div class="panel-footer">                                
		<button type="button" class="btn btn-primary pull-right" onClick="submitForm()" id="add-schedule">Add schedule</button>
	</div>                            
</div>
<!-- END PANEL WITH CONTROL CLASSES -->

    <div class="row">
        <div id='cal'></div>
    </div>   
</div>
@stop 

@section('scripts') 
<script>
$(document).ready(function() {
		
		$('#cal').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,basicWeek,basicDay'
			},
			defaultDate: '2017-02-12',
			navLinks: true, // can click day/week names to navigate views
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			events: [
				{
					title: 'All Day Event',
					start: '2017-02-01'
				},
				{
					title: 'Long Event',
					start: '2017-02-07',
					end: '2017-02-10'
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: '2017-02-09T16:00:00'
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: '2017-02-16T16:00:00'
				},
				{
					title: 'Conference',
					start: '2017-02-11',
					end: '2017-02-13'
				},
				{
					title: 'Meeting',
					start: '2017-02-12T10:30:00',
					end: '2017-02-12T12:30:00'
				},
				{
					title: 'Lunch',
					start: '2017-02-12T12:00:00'
				},
				{
					title: 'Meeting',
					start: '2017-02-12T14:30:00'
				},
				{
					title: 'Happy Hour',
					start: '2017-02-12T17:30:00'
				},
				{
					title: 'Dinner',
					start: '2017-02-12T20:00:00'
				},
				{
					title: 'Birthday Party',
					start: '2017-02-13T07:00:00'
				},
				{
					title: 'Click for Google',
					url: 'http://google.com/',
					start: '2017-02-28'
				}
			]
		});

		
	});

</script>

<link rel='stylesheet' href="{{ URL::to('fullcalendar/fullcalendar.css')}}" />
<script type="text/javascript" src="js/plugins/bootstrap/bootstrap-timepicker.min.js"></script>
<script type="text/javascript" src="js/plugins/bootstrap/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="js/plugins/bootstrap/bootstrap-file-input.js"></script>
<script type="text/javascript" src="js/plugins/bootstrap/bootstrap-select.js"></script>
<script src="{{ URL::to('fullcalendar/lib/moment.min.js')}}"></script>
<script src="{{ URL::to('fullcalendar/fullcalendar.js')}}"></script>
@stop