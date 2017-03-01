    <?php  use Carbon\Carbon; ?>

@extends('layouts/main')

@section('breadcrumb')
<ul class="breadcrumb">
    <li class="active">Enrollment</li>                    
</ul>
@stop

@section('nav-enroll') active @stop

@section('links')
    <link rel="stylesheet" type="text/css" href="/css/app.css" />
@stop

@section('page-content-wrapper')
 <!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">
            <!-- FIRST TAB -->
            <div class="panel panel-default tabs">                            
                <ul class="nav nav-tabs" role="tablist">
                    <li class="active"><a href="#tab-first" role="tab" data-toggle="tab">Add or Enroll a Student</a></li>
                    <li><a href="#tab-second" role="tab" data-toggle="tab">Currently Not Enrolled</a></li>
                     <a class="btn btn-danger pull-right" href="/load/Grade 10">Enroll Grade 10</a>
                    <a class="btn btn-warning pull-right" href="/load/Grade 9">Enroll Grade 9</a>
                    <a class="btn btn-success pull-right" href="/load/Grade 8">Enroll Grade 8</a> 
                    <a class="btn btn-info pull-right" href="/load/Grade 7">Enroll Grade 7</a>
                </ul>
                <div class="panel-body tab-content">
                    <div class="tab-pane" id="tab-second">
                            <!-- START DEFAULT DATATABLE -->
                        <div class="panel panel-default">
                            <div class="panel-heading">                                
                                <h3 class="panel-title">Student Profiles</h3>
                                <ul class="panel-controls">
                                    <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                </ul>                                
                            </div>
                            <div class="panel-body">
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Learner Reference No.</th>
                                            <th>First name</th>
                                            <th>Middle name</th>
                                            <th>Last name</th>
                                            <th>Status</th>
                                            <th>Grade level</th>
                                            </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <!-- END DEFAULT DATATABLE -->    
                    </div> 

                    <!-- SECOND TAB -->
                    <div class="tab-pane active" id="tab-first">
                    <form class="form-horizontal" action="{{ URL::to('students') }}" method="post">                          
                        {{ csrf_field() }}
                        <div class="panel-body form-group-separated">
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Registration Code</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-info"></span></span>
                                        <input type="text" class="form-control" readonly>                                            
                                    </div>
                                    <span class="help-block">This field will be automatically filled-out by the system for enrolled students.</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Learner Reference Number</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-info"></span></span>
                                        <input type="text" class="mask_lrn form-control" name="lrn">                                            
                                    </div>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            
                            <div class="form-group @if($errors->first('first-name')) has-error @endif">
                                <label class="col-md-3 col-xs-12 control-label">First Name</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                        <input type="text" class="form-control" name="first-name">                                            
                                    </div>
                                    <span class="help-block">@if($errors->first('first-name')) {{ $errors->first('first-name') }} @endif</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Middle Name</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                        <input type="text" class="form-control" name="middle-name">                                            
                                    </div>
                                    <span class="help-block"></span>
                                </div>
                            </div>

                            <div class="form-group @if($errors->first('last-name')) has-error @endif">
                                <label class="col-md-3 col-xs-12 control-label">Last Name</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                        <input type="text" class="form-control" name="last-name">                                            
                                    </div>
                                    <span class="help-block">@if($errors->first('last-name')) {{ $errors->first('last-name') }} @endif</span>
                                </div>
                            </div>

                            <div class="form-group">                                        
                                <label class="col-md-3 col-xs-12 control-label">Birth Date</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                        <input type="text" class="mask_date form-control" value="{{ Carbon::now()->toDateString() }}" name="birthdate">                                            
                                    </div>
                                    <span class="help-block">Use a YYYY-MM-DD date format. example: 2017-02-14</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Gender</label>
                                <div class="col-md-6 col-xs-12">                                                                                            
                                    <select class="form-control select" name="gender">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                    <span class="help-block"></span>
                                </div>
                            </div>

                                <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Status</label>
                                <div class="col-md-6 col-xs-12">                                                                                            
                                    <select class="form-control select" name="status">
                                        <option value="Passed">Passed</option>
                                        <option value="Retained">Retained</option>
                                    </select>
                                    <span class="help-block"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">School Last Attended</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-flag-o"></span></span>
                                        <input type="text" class="form-control" name="school-last-attended">                                            
                                    </div>
                                    <span class="help-block"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Year Graduated</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                        <input type="text" class="mask_year form-control" name="year-graduated">                                            
                                    </div>
                                    <span class="help-block">Use a four(4) digit year format. example: 2001</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Grade Level</label>
                                <div class="col-md-6 col-xs-12">                                                                                            
                                    <select class="form-control select" name="grade-level">
                                        <option>Grade 7</option>
                                        <option>Grade 8</option>
                                        <option>Grade 9</option>
                                        <option>Grade 10</option>
                                    </select>
                                    <span class="help-block"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Requirements</label>
                                <div class="col-md-6 col-xs-12">                                                                                                                                        
                                    <label class="check"><input type="checkbox" class="icheckbox" name="form137"/> Form 138</label><br>
                                    <label class="check"><input type="checkbox" class="icheckbox" name="birth-certificate"/> Birth Certificate</label><br>
                                    <label class="check"><input type="checkbox" class="icheckbox" name="id_picture"/> 1x1 Picture for ID</label>
                                    <span class="help-block"></span>
                                </div>
                            </div>

                            <div class="form-group @if($errors->first('guardian-name')) has-error @endif">
                                <label class="col-md-3 col-xs-12 control-label">Guardian Name</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-info"></span></span>
                                        <input type="text" class="form-control" name="guardian-name">                                            
                                    </div>
                                    <span class="help-block">@if($errors->first('guardian-name')) {{ $errors->first('guardian-name') }} @endif</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Mobile Number</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-mobile"></span></span>
                                        <input type="text" class="form-control" name="mobile-number">                                            
                                    </div>
                                    <span class="help-block"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Telephone Number</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-phone"></span></span>
                                        <input type="text" class="form-control" name="tel-number">                                            
                                    </div>
                                    <span class="help-block"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Address</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-road"></span></span>
                                        <input type="text" class="form-control" name="address">                                            
                                    </div>
                                    <span class="help-block"></span>
                                </div>
                            </div>

                            <div class="form-group @if($errors->first('general-average')) has-error @endif" id="general-average">
                                <label class="col-md-3 col-xs-12 control-label">General Average</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-ticket"></span></span>
                                        <input type="text" class="form-control" name="general-average">                                            
                                    </div>
                                    <span class="help-block">@if($errors->first('general-average')) {{ $errors->first('general-average') }} @else Ex. 97.25 or 90.5 @endif</span>
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary pull-right">Submit</button>
                        </div>
                        </form>
                    </div>                         
                    </div>
                </div>
            </div>                                
        </div>
    </div>                    
<!-- END PAGE CONTENT WRAPPER -->          

<!-- Small modal -->
<button id="modal-button" type="button" class="btn btn-primary hidden" data-toggle="modal"
        data-target=".bs-example-modal-sm">Small modal
</button>

<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel2">Available Actions</h4>
            </div>
            <div class="modal-body">
                <form action="{{ URL::to('show-student') }}" method="post">
                {{ csrf_field() }}
                    <input id="show" value="" class="hidden" name="selected-id">
                    <p align="center">
                        <button type="submit" class="btn btn-success">View Student Information Here</button>
                    </p>
                </form>
                <form action="{{ URL::to('students/editButton') }}" method="post">
                {{ csrf_field() }}
                    <input id="edit" value="" class="hidden" name="selected-id">
                    <p align="center">
                        <button type="submit" class="btn btn-success">Edit Student Information Here</button>
                    </p>
                </form>
                <form action="{{ URL::to('show-student') }}" method="post">
                {{ csrf_field() }}
                    <input id="show" value="" class="hidden" name="selected-id">
                    <p align="center">
                        <button type="submit" class="btn btn-success">Enroll Selected Student Here</button>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>
@stop 

@section('scripts')
<script type="text/javascript" src="{{ URL::to('js/plugins/maskedinput/jquery.maskedinput.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::to('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::to('js/plugins/bootstrap/bootstrap-select.js') }}"></script>

<script>
$clickedRow = $('.datatable').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "{{ URL::to('not_enrolled.php') }}", 
            "columnDefs": [
                {
                    "targets": 5,
                    "render": function ( data, type, row ) {
                        if(data == 'Enrolled') return '<span class="label label-success">' + data + '</span>';
                        else if(data == 'Retained') return '<span class="label label-warning">' + data + '</span>';
                        else return '<span class="label label-info">' + data + '</span>';
                    }
                }
            ]
        });

$('.datatable tbody').on('dblclick', 'tr', function () {
    $currentRowData = $clickedRow.row(this).data();
    $('#edit').attr('value', $currentRowData[0]);
    $('#show').attr('value', $currentRowData[0]);
    $('#modal-button').trigger('click');
});
</script>
@stop