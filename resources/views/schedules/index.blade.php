<?php use Carbon\Carbon; ?>
@extends('layouts/main')

@section('toggled') page-navigation-toggled @stop

@section('breadcrumb')
<ul class="breadcrumb">
    <li class="active">Schedules</li>
</ul>
@stop

@section('nav-schedules') active @stop

@section('page-content-wrapper')
<div class="page-content-wrap"> 
	<div class="row">
		<div class="col-md-12">
			<form class="form-horizontal">
				<div class="panel panel-default tabs">                            
					<ul class="nav nav-tabs" role="tablist">
						<li class="active"><a href="#tab-grade7" role="tab" data-toggle="tab">GRADE 7</a></li>
						<li><a href="#tab-grade8" role="tab" data-toggle="tab">GRADE 8</a></li>
						<li><a href="#tab-grade9" role="tab" data-toggle="tab">GRADE 9</a></li>
						<li><a href="#tab-grade10" role="tab" data-toggle="tab">GRADE 10</a></li>
						<a type="button" class="btn btn-primary pull-right" data-toggle="modal" href='#add-schedule-modal'>Add schedule</a>
					</ul>
					<div class="panel-body tab-content">
						<div class="tab-pane active" id="tab-grade7">
							<div class="row">
								<!-- MONDAY -->
								<div class="col-md-3">
									<h4>MONDAY</h4>                               
									<div class="messages">
										<div class="item">
											<div class="text">
												<div class="heading">
													<a href="#">FILIPINO</a>
													<span class="pull-right">06:00 - 7:30</span>
												</div>
													Section: Rizal<br>
													Room Number: 201<br>
													Teacher: Mr. Alexander Puket<br>
											</div>
										</div>
									</div>                        
								</div>
								<!-- END MONDAY -->

								<!-- TUESDAY -->
								<div class="col-md-2">
									<h4>TUESDAY</h4>                               
									<div class="messages">
										<div class="item">
											<div class="text">
												<div class="heading">
													<a href="#">FILIPINO</a>
													<span class="pull-right">06:00 - 7:30</span>
												</div>
													Section: Rizal<br>
													Room Number: 201<br>
													Teacher: Mr. Alexander Puket<br>
											</div>
										</div>
									</div>                        
								</div>
								<!-- END TUESDAY -->

								<!-- WEDNESDAY -->
								<div class="col-md-2">
									<h4>WEDNESDAY</h4>                               
									<div class="messages">
										<div class="item">
											<div class="text">
												<div class="heading">
													<a href="#">FILIPINO</a>
													<span class="pull-right">06:00 - 7:30</span>
												</div>
													Section: Rizal<br>
													Room Number: 201<br>
													Teacher: Mr. Alexander Puket<br>
											</div>
										</div>
									</div>                        
								</div>
								<!-- END WEDNESDAY -->

								<!-- THURSDAY -->
								<div class="col-md-2">
									<h4>THURSDAY</h4>                               
									<div class="messages">
										<div class="item">
											<div class="text">
												<div class="heading">
													<a href="#">FILIPINO</a>
													<span class="pull-right">06:00 - 7:30</span>
												</div>
													Section: Rizal<br>
													Room Number: 201<br>
													Teacher: Mr. Alexander Puket<br>
											</div>
										</div>
									</div>                        
								</div>
								<!-- END THURSDAY -->

								<!-- FRIDAY -->
								<div class="col-md-3">
									<h4>FRIDAY</h4>                               
									<div class="messages">
										<div class="item">
											<div class="text">
												<div class="heading">
													<a href="#">FILIPINO</a>
													<span class="pull-right">06:00 - 7:30</span>
												</div>
													Section: Rizal<br>
													Room Number: 201<br>
													Teacher: Mr. Alexander Puket<br>
											</div>
										</div>
									</div>                        
								</div>
								<!-- END FRIDAY -->
							</div>
						</div>

						<div class="tab-pane" id="tab-grade8">
							<div class="row">
								<!-- MONDAY -->
								<div class="col-md-3">
									<h4>MONDAY</h4>                               
									<div class="messages">
										<div class="item">
											<div class="text">
												<div class="heading">
													<a href="#">FILIPINO</a>
													<span class="pull-right">06:00 - 7:30</span>
												</div>
													Section: Rizal<br>
													Room Number: 201<br>
													Teacher: Mr. Alexander Puket<br>
											</div>
										</div>
									</div>                        
								</div>
								<!-- END MONDAY -->

								<!-- TUESDAY -->
								<div class="col-md-2">
									<h4>TUESDAY</h4>                               
									<div class="messages">
										<div class="item">
											<div class="text">
												<div class="heading">
													<a href="#">FILIPINO</a>
													<span class="pull-right">06:00 - 7:30</span>
												</div>
													Section: Rizal<br>
													Room Number: 201<br>
													Teacher: Mr. Alexander Puket<br>
											</div>
										</div>
									</div>                        
								</div>
								<!-- END TUESDAY -->

								<!-- WEDNESDAY -->
								<div class="col-md-2">
									<h4>WEDNESDAY</h4>                               
									<div class="messages">
										<div class="item">
											<div class="text">
												<div class="heading">
													<a href="#">FILIPINO</a>
													<span class="pull-right">06:00 - 7:30</span>
												</div>
													Section: Rizal<br>
													Room Number: 201<br>
													Teacher: Mr. Alexander Puket<br>
											</div>
										</div>
									</div>                        
								</div>
								<!-- END WEDNESDAY -->

								<!-- THURSDAY -->
								<div class="col-md-2">
									<h4>THURSDAY</h4>                               
									<div class="messages">
										<div class="item">
											<div class="text">
												<div class="heading">
													<a href="#">FILIPINO</a>
													<span class="pull-right">06:00 - 7:30</span>
												</div>
													Section: Rizal<br>
													Room Number: 201<br>
													Teacher: Mr. Alexander Puket<br>
											</div>
										</div>
									</div>                        
								</div>
								<!-- END THURSDAY -->

								<!-- FRIDAY -->
								<div class="col-md-3">
									<h4>FRIDAY</h4>                               
									<div class="messages">
										<div class="item">
											<div class="text">
												<div class="heading">
													<a href="#">FILIPINO</a>
													<span class="pull-right">06:00 - 7:30</span>
												</div>
													Section: Rizal<br>
													Room Number: 201<br>
													Teacher: Mr. Alexander Puket<br>
											</div>
										</div>
									</div>                        
								</div>
								<!-- END FRIDAY -->
							</div>
						</div> 

						<div class="tab-pane" id="tab-grade9">
							<div class="row">
								<!-- MONDAY -->
								<div class="col-md-3">
									<h4>MONDAY</h4>                               
									<div class="messages">
										<div class="item">
											<div class="text">
												<div class="heading">
													<a href="#">FILIPINO</a>
													<span class="pull-right">06:00 - 7:30</span>
												</div>
													Section: Rizal<br>
													Room Number: 201<br>
													Teacher: Mr. Alexander Puket<br>
											</div>
										</div>
									</div>                        
								</div>
								<!-- END MONDAY -->

								<!-- TUESDAY -->
								<div class="col-md-2">
									<h4>TUESDAY</h4>                               
									<div class="messages">
										<div class="item">
											<div class="text">
												<div class="heading">
													<a href="#">FILIPINO</a>
													<span class="pull-right">06:00 - 7:30</span>
												</div>
													Section: Rizal<br>
													Room Number: 201<br>
													Teacher: Mr. Alexander Puket<br>
											</div>
										</div>
									</div>                        
								</div>
								<!-- END TUESDAY -->

								<!-- WEDNESDAY -->
								<div class="col-md-2">
									<h4>WEDNESDAY</h4>                               
									<div class="messages">
										<div class="item">
											<div class="text">
												<div class="heading">
													<a href="#">FILIPINO</a>
													<span class="pull-right">06:00 - 7:30</span>
												</div>
													Section: Rizal<br>
													Room Number: 201<br>
													Teacher: Mr. Alexander Puket<br>
											</div>
										</div>
									</div>                        
								</div>
								<!-- END WEDNESDAY -->

								<!-- THURSDAY -->
								<div class="col-md-2">
									<h4>THURSDAY</h4>                               
									<div class="messages">
										<div class="item">
											<div class="text">
												<div class="heading">
													<a href="#">FILIPINO</a>
													<span class="pull-right">06:00 - 7:30</span>
												</div>
													Section: Rizal<br>
													Room Number: 201<br>
													Teacher: Mr. Alexander Puket<br>
											</div>
										</div>
									</div>                        
								</div>
								<!-- END THURSDAY -->

								<!-- FRIDAY -->
								<div class="col-md-3">
									<h4>FRIDAY</h4>                               
									<div class="messages">
										<div class="item">
											<div class="text">
												<div class="heading">
													<a href="#">FILIPINO</a>
													<span class="pull-right">06:00 - 7:30</span>
												</div>
													Section: Rizal<br>
													Room Number: 201<br>
													Teacher: Mr. Alexander Puket<br>
											</div>
										</div>
									</div>                        
								</div>
								<!-- END FRIDAY -->
							</div>
						</div>

						<div class="tab-pane" id="tab-grade10">
							<div class="row">
								<!-- MONDAY -->
								<div class="col-md-3">
									<h4>MONDAY</h4>                               
									<div class="messages">
										<div class="item">
											<div class="text">
												<div class="heading">
													<a href="#">FILIPINO</a>
													<span class="pull-right">06:00 - 7:30</span>
												</div>
													Section: Rizal<br>
													Room Number: 201<br>
													Teacher: Mr. Alexander Puket<br>
											</div>
										</div>
									</div>                        
								</div>
								<!-- END MONDAY -->

								<!-- TUESDAY -->
								<div class="col-md-2">
									<h4>TUESDAY</h4>                               
									<div class="messages">
										<div class="item">
											<div class="text">
												<div class="heading">
													<a href="#">FILIPINO</a>
													<span class="pull-right">06:00 - 7:30</span>
												</div>
													Section: Rizal<br>
													Room Number: 201<br>
													Teacher: Mr. Alexander Puket<br>
											</div>
										</div>
									</div>                        
								</div>
								<!-- END TUESDAY -->

								<!-- WEDNESDAY -->
								<div class="col-md-2">
									<h4>WEDNESDAY</h4>                               
									<div class="messages">
										<div class="item">
											<div class="text">
												<div class="heading">
													<a href="#">FILIPINO</a>
													<span class="pull-right">06:00 - 7:30</span>
												</div>
													Section: Rizal<br>
													Room Number: 201<br>
													Teacher: Mr. Alexander Puket<br>
											</div>
										</div>
									</div>                        
								</div>
								<!-- END WEDNESDAY -->

								<!-- THURSDAY -->
								<div class="col-md-2">
									<h4>THURSDAY</h4>                               
									<div class="messages">
										<div class="item">
											<div class="text">
												<div class="heading">
													<a href="#">FILIPINO</a>
													<span class="pull-right">06:00 - 7:30</span>
												</div>
													Section: Rizal<br>
													Room Number: 201<br>
													Teacher: Mr. Alexander Puket<br>
											</div>
										</div>
									</div>                        
								</div>
								<!-- END THURSDAY -->

								<!-- FRIDAY -->
								<div class="col-md-3">
									<h4>FRIDAY</h4>                               
									<div class="messages">
										<div class="item">
											<div class="text">
												<div class="heading">
													<a href="#">FILIPINO</a>
													<span class="pull-right">06:00 - 7:30</span>
												</div>
													Section: Rizal<br>
													Room Number: 201<br>
													Teacher: Mr. Alexander Puket<br>
											</div>
										</div>
									</div>                        
								</div>
								<!-- END FRIDAY -->
							</div>
						</div>

					</div>
					<div class="panel-footer">                                                                        
						<button class="btn btn-primary pull-right">Save Changes <span class="fa fa-floppy-o fa-right"></span></button>
					</div>
				</div>                                
			</form>
		</div>
	</div>                       
</div>
@stop 

@section('modals')
<a class="btn btn-primary hidden" data-toggle="modal" href='#add-schedule-modal' id="modal-btn">Trigger modal</a>
<div class="modal fade" id="add-schedule-modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Modal title</h4>
			</div>
			<div class="modal-body">
				<form class="form-teacher form-horizontal">
					{{ csrf_field() }}                                  
					<div class="panel-body form-group-separated">
						<div class="form-group">
							<label class="col-md-3 col-xs-12 control-label">Grade Level</label>
							<div class="col-md-6 col-xs-12">                                            
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-tag"></span></span>
									<select class="form-control" name="select-grade-level" id="select-grade-level">
										<option>Grade 7</option>
										<option>Grade 8</option>
										<option>Grade 9</option>
										<option>Grade 10</option>
									</select>
								</div>                                            
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-3 col-xs-12 control-label">Day</label>
							<div class="col-md-6 col-xs-12">                                            
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-tag"></span></span>
									<select class="form-control" name="select-day" id="select-day">
										<option>Monday</option>
										<option>Tuesday</option>
										<option>Wednesday</option>
										<option>Thursday</option>
										<option>Firday</option>
									</select>
								</div>                                            
							</div>
						</div>

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
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onClick="submitForm()" id="add-schedule">Add Schedule</button>
			</div>
		</div>
	</div>
</div>
@stop

@section('this-page-plugins') 
<script type="text/javascript" src="/js/plugins/bootstrap/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="/js/plugins/bootstrap/bootstrap-timepicker.min.js"></script>
<script type="text/javascript" src="/js/plugins/bootstrap/bootstrap-file-input.js"></script>
<script type="text/javascript" src="/js/plugins/bootstrap/bootstrap-select.js"></script>
@stop