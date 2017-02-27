@extends('layouts.main')

@section('breadcrumb')
<ul class="breadcrumb">
    <li class="active">Summary</li>
</ul>
@stop

@section('page-content-wrapper')
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">                
    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal">
                <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Summary</h4>
                        </div>
                    <div class="panel-body form-group-separated">
                        <div class="form-group">
                            <label class="col-md-4 col-xs-12 control-label">Total No. of Enrolled Students</label>
                            <div class="col-md-6 col-xs-12">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-users"></span></span>
                                    @foreach($enrolledCount as $grade7)
                                        @if($loop->index == 0) <input class="form-control" name="total-enrolled" value="{{ $grade7 }}" readonly/> @endif
                                        @if($loop->index != 0) @continue @endif
                                    @endforeach
                                </div>                                            
                                <span class="help-block"></span>
                            </div>
                        </div>
                        
                        <div class="form-group">                                        
                            <label class="col-md-4 col-xs-12 control-label">Total Section Created</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-th-large"></span></span>
                                    @foreach($sectionCount as $grade7)
                                        @if($loop->index == 0) <input class="form-control" name="total-section" value="{{ $grade7 }}" readonly/> @endif
                                        @if($loop->index != 0) @continue @endif
                                    @endforeach
                                </div>            
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">                                        
                            <label class="col-md-4 col-xs-12 control-label">Total No. of Skipped Students (Excess)</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-asterisk"></span></span>
                                    @foreach($unEnrolledCount as $grade7)
                                        @if($loop->index == 0) <input class="form-control" name="total-skipped" value="{{ $grade7 }}" readonly/> @endif
                                        @if($loop->index != 0) @continue @endif
                                    @endforeach
                                </div>            
                                <span class="help-block">Students that needs to be manually sectioned</span>
                            </div>
                        </div>

                        @foreach($unEnrolledGrade7 as $student)
                        <div class="form-group hidden" id="details">                                        
                            <div class="panel panel-default">
                                <form class="form-horizontal">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><strong>Quick</strong> Enroll</h3>
                                    </div>
                                    <div class="panel-body"> 
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Registration Code</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="fa fa-info"></span></span>
                                                    @if($loop->index == 0) <input class="form-control" name="registration-code" value="{{ $student->registration_code }}" readonly/> @endif
                                                </div>                                            
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Student's Full Name</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                                    @if($loop->index == 0) <input class="form-control" name="student-fullname" value="{{ $student->first_name . ' ' . $student->middle_name . ' ' . $student->last_name }}" readonly/> @endif
                                                </div>                                            
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">General Average</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="fa fa-ticket"></span></span>
                                                    @if($loop->index == 0) <input class="form-control" name="general-average" value="{{ $student->general_average }}" readonly/> @endif
                                                </div>                                            
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Section</label>
                                            <div class="col-md-6 col-xs-12">                                                                                            
                                                <select class="form-control select" data-live-search="true">
                                                @foreach($section as $sections)
                                                    @foreach($sections as $section)
                                                        <option>{{ $section->order }}</option>
                                                    @endforeach
                                                    @break
                                                @endforeach
                                                </select>   
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-footer">
                                        {{ $unEnrolledGrade7->links('vendor.pagination.bootstrap-4') }}
                                    </div>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </form>
            </div>
            </div>
        </div>
    </div>
</div>
<!-- PAGE CONTENT WRAPPER --> 
@stop

@section('this-page-plugins')
<script type="text/javascript" src="/js/plugins/smartwizard/jquery.smartWizard-2.0.min.js"></script>        
<script type="text/javascript" src="/js/plugins/jquery-validation/jquery.validate.js"></script>
<script type="text/javascript" src="js/plugins/bootstrap/bootstrap-select.js"></script>
@stop

@section('scripts')
<script>
if($('input[name="total-skipped"]').val() != '0') $('div#details').removeClass('hidden');
</script>
@stop