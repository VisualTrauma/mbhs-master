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
                                        <input class="form-control" name="total-enrolled" value="{{ $totalEnrolled }}" readonly/>
                                </div>                                            
                                <span class="help-block"></span>
                            </div>
                        </div>
                        
                        <div class="form-group">                                        
                            <label class="col-md-4 col-xs-12 control-label">Total Section Created</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-th-large"></span></span>
                                        <input class="form-control" name="total-section" value="{{ floor($totalEnrolled / 60) }}" readonly/>
                                </div>            
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">                                        
                            <label class="col-md-4 col-xs-12 control-label">Total No. of Skipped Students (Excess)</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-asterisk"></span></span>
                                    <input class="form-control" name="total-skipped" value="{{ $totalStudents }}" readonly/>
                                </div>            
                                <span class="help-block">Students that needs to be manually sectioned</span>
                            </div>
                        </div>

                        <div class="form-group hidden" id="details">                                        
                            <div class="panel panel-default">
                                <form class="form-horizontal" id="form-enroll" method="get" action="/single-enroll/{{ $grade }}">
                                <input type="text" class="hidden" name="grade-level" id="grade-level">
                                    <div class="panel-heading" id="remaining">
                                        <h3 class="panel-title"><strong>Quick</strong> Enroll</h3>
                                        <h3 class="pull-right"><span>0</span> student/s to enroll</h3>
                                    </div>
                                    <div class="panel-body"> 
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Registration Code</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="input-group" id="registration-code">
                                                    <span class="input-group-addon"><span class="fa fa-info"></span></span>
                                                    <input class="form-control" name="registration-code" value="" readonly/>
                                                </div>                                            
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Student's Full Name</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="input-group" id="fullname">
                                                    <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                                    <input class="form-control" name="student-fullname" value="" readonly/>
                                                </div>                                            
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">General Average</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="input-group" id="general-average">
                                                    <span class="input-group-addon"><span class="fa fa-ticket"></span></span>
                                                    <input class="form-control" name="general-average" value="" readonly/>
                                                </div>                                            
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Section</label>
                                            <div class="col-md-6 col-xs-12" id="section">                                                                                            
                                                <select class="form-control select" data-live-search="true">
                                                <option></option>
                                                </select>   
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="panel-footer">
                                    <button class="btn btn-info pull-right">Enroll</button>
                                </div>
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

<script type="text/javascript">
$(document).ready(function(){
    getUnEnrolled();
});

function getUnEnrolled() {
    $(".form-enroll").submit(function(e)
    {
        var formObj = $(this);
        var formURL = formObj.attr("action");
        var formData = new FormData(this);

        $.ajax({
            url: formURL,
            type: 'get',
            data:  formData,
            mimeType:"multipart/form-data",
            contentType: false,
            cache: false,
            processData: false,
        success: function(data, textStatus, jqXHR)
        {
            $.each(data, function(index, student){
                $('#remaining').html('<h3 class="panel-title"><strong>Quick</strong> Enroll</h3><h3 class="pull-right"><span>' + student.total + '</span> student/s to enroll</h3>');
            });
        },
            error: function(jqXHR, textStatus, errorThrown) 
            {
            $('.btn-warning').click();
            $('#close-modal').click();
            }          
        });
        e.preventDefault(); //Prevent Default action. 
        e.unbind();
    }); 
    $(".form-subject").submit(); //Submit the form
}
</script>
@stop