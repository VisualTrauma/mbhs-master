@extends('layouts/main')
@section('breadcrumb')
<ul class="breadcrumb">
    <li>Students</li>                    
    <li class="active">{{ $student->first_name }} {{ $student->last_name }}</li>                    
</ul>
@stop

@section('nav-students') active @stop


@section('page-content-wrapper')
<!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">                    
                    <div class="row">                        
                        <div class="col-md-4">
                            <form action="#" class="form-horizontal">
                            <div class="panel panel-default">                                
                                <div class="panel-body">
                                    <div class="text-center" id="user_image">
                                        <img src="/assets/images/users/no-image.jpg" class="img-thumbnail"/>
                                    </div>                                    
                                </div>
                                <div class="panel-body form-group-separated">
                                    <div class="form-group">
                                        <label class="col-md-4 col-xs-5 control-label">LRN</label>
                                        <div class="col-md-8 col-xs-7 line-height-30">{{ $student->lrn }}</div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-4 col-xs-5 control-label">Reg. Code</label>
                                        <div class="col-md-8 col-xs-7 line-height-30">{{ $student->registration_code }}</div>
                                    </div>
                                    
                                     <div class="form-group">
                                        <label class="col-md-4 col-xs-5 control-label">Status</label>
                                        <div class="col-md-8 col-xs-7 line-height-30">{{ $student->status }}</div>
                                    </div>

                                     <div class="form-group">
                                        <label class="col-md-4 col-xs-5 control-label">Requirements</label>
                                        <div class="col-md-8 col-xs-7 line-height-30">{{ $student->requirements }}</div>
                                    </div>

                                </div>
                            </div>
                            </form>
                            
                        </div>
                        <div class="col-md-8">
                            <form action="#" class="form-horizontal">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3><span class="fa fa-pencil"></span> Profile</h3>
                                    <p>This information lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer faucibus, est quis molestie tincidunt, elit arcu faucibus erat.</p>
                                </div>
                                <div class="panel-body form-group-separated">
                                    <div class="form-group">
                                        <label class="col-md-4 col-xs-1 control-label">Full Name</label>
                                        <div class="col-md-8 col-xs-7 line-height-30">{{ $student->first_name }} @if($student->middle_name != null) {{ $student->middle_name }} @endif {{ $student->last_name }}</div>
                                    </div> 
                                    <div class="form-group">
                                            <label class="col-md-4 col-xs-1 control-label">Grade Level</label>
                                            <div class="col-md-8 col-xs-7 line-height-30">{{ $student->year_level }}</div>
                                        </div>
                                    <div class="form-group">
                                        <label class="col-md-4 col-xs-1 control-label">Gender</label>
                                        <div class="col-md-8 col-xs-7 line-height-30">{{ $student->gender }}</div>
                                    </div>    
                                    @if($student->year_level != null)
                                        <div class="form-group">
                                            <label class="col-md-4 col-xs-1 control-label">School Last Attended</label>
                                            <div class="col-md-8 col-xs-7 line-height-30">{{ $student->last_school_attended }}</div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 col-xs-1 control-label">Year Graduated</label>
                                            <div class="col-md-8 col-xs-7 line-height-30">{{ $student->year_graduated }}</div>
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        <label class="col-md-4 col-xs-1 control-label">General Average</label>
                                        <div class="col-md-8 col-xs-7 line-height-30">{{ $student->general_average }}</div>
                                    </div>
                                    <div class="form-group">
                                            <label class="col-md-4 col-xs-1 control-label">Parent/Guardian Name</label>
                                            <div class="col-md-8 col-xs-7 line-height-30">{{ $student->guardian_name }}</div>
                                    </div>
                                    <div class="form-group">
                                            <label class="col-md-4 col-xs-1 control-label">Address</label>
                                            <div class="col-md-8 col-xs-7 line-height-30">{{ $student->address }}</div>
                                    </div>
                                    <div class="form-group">
                                            <label class="col-md-4 col-xs-1 control-label">Mobile Number</label>
                                            <div class="col-md-8 col-xs-7 line-height-30">{{ $student->mobile_number }}</div>
                                    </div>
                                    @if($student->tel_number != null)
                                        <div class="form-group">
                                                <label class="col-md-4 col-xs-1 control-label">Telephone Number</label>
                                                <div class="col-md-8 col-xs-7 line-height-30">{{ $student->tel_number }}</div>
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        <div class="col-md-12 col-xs-5">
                                            <button class="btn btn-primary btn-rounded pull-right">Back</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                                
                            </div>
                        </div>
                        
                    </div>
                    

                </div>
                <!-- END PAGE CONTENT WRAPPER --> 
@stop