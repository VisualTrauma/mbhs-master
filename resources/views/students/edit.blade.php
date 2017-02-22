@extends('layouts/main')

@section('breadcrumb')
<ul class="breadcrumb">
    <li>Student</li>                    
    <li class="active">edit</li>                    
</ul>
@stop

@section('page-content-wrapper')
 <!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal" action="{{ URL::route('students.update', $student->id) }}" method="post">                          
            {{ csrf_field() }} {{ method_field('patch') }}
            <div class="panel-body form-group-separated">
                <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Registration Code</label>
                    <div class="col-md-6 col-xs-12">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="fa fa-info"></span></span>
                            <input type="text" class="form-control" value="{{ $student->registration_code }}" name="registration_code" readonly>                                            
                        </div>
                        <span class="help-block">This field will be automatically filled-out by the system for enrolled students.</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Learner Reference Number</label>
                    <div class="col-md-6 col-xs-12">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="fa fa-info"></span></span>
                            <input type="text" class="mask_lrn form-control" name="lrn" value="{{ $student->registration_code }}">                                            
                        </div>
                        <span class="help-block"></span>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">First Name</label>
                    <div class="col-md-6 col-xs-12">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="fa fa-user"></span></span>
                            <input type="text" class="form-control" name="first-name" value="{{ $student->first_name }}">                                            
                        </div>
                        <span class="help-block"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Middle Name</label>
                    <div class="col-md-6 col-xs-12">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="fa fa-user"></span></span>
                            <input type="text" class="form-control" name="middle-name" value="{{ $student->middle_name }}">                                            
                        </div>
                        <span class="help-block"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Last Name</label>
                    <div class="col-md-6 col-xs-12">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="fa fa-user"></span></span>
                            <input type="text" class="form-control" name="last-name" value="{{ $student->last_name }}">                                            
                        </div>
                        <span class="help-block"></span>
                    </div>
                </div>

                <div class="form-group">                                        
                    <label class="col-md-3 col-xs-12 control-label">Birth Date</label>
                    <div class="col-md-6 col-xs-12">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                            <input type="text" class="form-control datepicker" value="{{ $student->birthdate }}" name="birthdate">                                            
                        </div>
                        <span class="help-block">Click on input field to get datepicker</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Gender</label>
                    <div class="col-md-6 col-xs-12">                                                                                            
                        <select class="form-control select" name="gender">
                            <option value="male" @if($student->gender == 'Male') checked="checked" @endif>Male</option>
                            <option value="female" @if($student->gender == 'Female') checked="checked" @endif>Female</option>
                        </select>
                        <span class="help-block"></span>
                    </div>
                </div>

                    <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Status</label>
                    <div class="col-md-6 col-xs-12">
                        <div class="input-group">                                                                                            
                            <span class="input-group-addon"><span class="fa fa-exclamation"></span></span>
                            <input type="text" class="form-control" value="@if($student->general_average < 75) Retained @else {{ $student->status }} @endif" name="status"> 
                        </div>
                        <span class="help-block"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">School Last Attended</label>
                    <div class="col-md-6 col-xs-12">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="fa fa-flag-o"></span></span>
                            <input type="text" class="form-control" name="school-last-attended" value="{{ $student->last_school_attended }}">                                            
                        </div>
                        <span class="help-block"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Year Graduated</label>
                    <div class="col-md-6 col-xs-12">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                            <input type="text" class="mask_year form-control" name="year-graduated" value="{{ $student->year_graduated }}">                                            
                        </div>
                        <span class="help-block">Please use a four(4) digit year format. example: 2001</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Grade Level</label>
                    <div class="col-md-6 col-xs-12"> 
                        <div class="input-group">                                                                                           
                            <span class="input-group-addon"><span class="fa fa-exclamation"></span></span>
                            <input type="text" class="form-control" name="grade-level" value="{{ $student->grade_level }}">
                        </div>
                        <span class="help-block"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Requirements</label>
                    <div class="col-md-6 col-xs-12">                                                                                                                                        
                        <label class="check"><input type="checkbox" class="icheckbox" name="form137" @if($student->form137 == 'on') checked="checked" @endif/> Form 138</label><br>
                        <label class="check"><input type="checkbox" class="icheckbox" name="birth-certificate" @if($student->birth_certificate == 'on') checked="checked" @endif/> Birth Certificate</label><br>
                        <label class="check"><input type="checkbox" class="icheckbox" name="id_picture" @if($student->id_picture == 'on') checked="checked" @endif/> 1x1 Picture for ID</label>
                        <span class="help-block"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Guardian Name</label>
                    <div class="col-md-6 col-xs-12">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="fa fa-info"></span></span>
                            <input type="text" class="form-control" name="guardian-name" value="{{ $student->guardian_name }}">                                            
                        </div>
                        <span class="help-block"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Mobile Number</label>
                    <div class="col-md-6 col-xs-12">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="fa fa-mobile"></span></span>
                            <input type="text" class="form-control" name="mobile-number" value="{{ $student->mobile_number }}">                                            
                        </div>
                        <span class="help-block"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Telephone Number</label>
                    <div class="col-md-6 col-xs-12">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="fa fa-phone"></span></span>
                            <input type="text" class="form-control" name="tel-number" value="{{ $student->tel_number }}">                                            
                        </div>
                        <span class="help-block"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Address</label>
                    <div class="col-md-6 col-xs-12">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="fa fa-road"></span></span>
                            <input type="text" class="form-control" name="address" value="{{ $student->address }}">                                            
                        </div>
                        <span class="help-block"></span>
                    </div>
                </div>

                <div class="form-group" id="general-average">
                    <label class="col-md-3 col-xs-12 control-label">General Average</label>
                    <div class="col-md-6 col-xs-12">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="fa fa-ticket"></span></span>
                            <input type="text" class="form-control" name="gen-ave" value="{{ $student->general_average }}">                                            
                        </div>
                        <span class="help-block">Ex. 97.25 or 90.5</span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12 col-xs-12">
                        <button class="btn btn-primary pull-right">Submit</button>
                    </div>
                </div>                
            </div>
            </form>
        </div>
    </div>
</div>
@stop