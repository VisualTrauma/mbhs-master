@extends('layouts/main')

@section('breadcrumb')
<ul class="breadcrumb">
    <li class="active">Subjects</li>
</ul>
@stop

@section('nav-subjects') active @stop

@section('page-content-wrapper')
 <!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
<!-- START RESPONSIVE TABLES -->
    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal">
                <div class="panel panel-default tabs">                            
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="active"><a href="#tab-first" role="tab" data-toggle="tab">Subject Information</a></li>
                        <li><a href="#tab-second" role="tab" data-toggle="tab">TVE - Subject Information</a></li>
                        <button type="button" class="btn btn-info pull-right" data-toggle="modal" onClick="addSubject()">Add new subject</button>
                    </ul>
                    <div class="panel-body tab-content">
                        <div class="tab-pane active" id="tab-first">
                            <div class="panel-body panel-body-table">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="subject-table">
                                        <thead>
                                            <tr>
                                                <th>Code</th>
                                                <th>Description</th>
                                                <th>Date Created</th>
                                                <th>Added by</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>                                            
                                        </tbody>
                                    </table>
                                </div>                                
                            </div>
                        </div>

                        <div class="tab-pane" id="tab-second">
                            <div class="panel-body panel-body-table">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="tve-subject-table">
                                        <thead>
                                            <tr>
                                                <th>Description</th>
                                                <th>Applicable for</th>
                                                <th>Date Created</th>
                                                <th>Added by</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>                                            
                                        </tbody>
                                    </table>
                                </div>                                
                            </div>
                        </div>                                        
                    </div>
                    <div class="panel-footer">                                                                        
                    </div>
                </div>                                
            
            </form>





                
                                                
        </div>
    </div>
    <!-- END RESPONSIVE TABLES -->
<!-- END PAGE CONTENT WRAPPER -->                                    
</div>         
@stop

@section('noty')
<div class="form-group hidden">                                            
    <button class="btn btn-success" onClick="noty({text: 'Subject profile successfully added!', layout: 'topRight', type: 'success'});" id="added">Success</button>
    <button class="btn btn-success" onClick="noty({text: 'Subject profile successfully updated!', layout: 'topRight', type: 'success'});" id="updated">Success</button> 
    <button class="btn btn-danger" onClick="noty({text: 'There was an error', layout: 'topRight', type: 'error'});">Error</button> 
    <button class="btn btn-warning" onClick="noty({text: 'An error has occured, please try again later.', layout: 'topRight', type: 'warning'});">Warning</button> 
    <button class="deleted btn btn-info" onClick="noty({text: 'Subject profile successfully deleted!', layout: 'topRight', type: 'information'});">Warning</button>
    <button class="btn btn-primary" onClick="notyConfirm();">Confirm</button>                                                                                  
</div>
@stop

@section('modals')
<button class="btn btn-primary hidden" data-toggle="modal" href='#subject-modal' id="subject-modal-btn">Trigger modal</button>
<div class="modal fade" id="subject-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit subject information</h4>
            </div>
            <div class="modal-body">
                <form class="form-subject form-horizontal">
                {{ csrf_field() }}
                                 <blockquote class="blockquote-warning">
                                     <strong>Please double check fields before adding or saving subject.</strong><br>
                                     <strong>Tick the checkbox if adding TVE Subjects.</strong>
                                 </blockquote>                                   
                                <div class="panel-body form-group-separated">
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Add As TVE Subject</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                        <input type="checkbox" name="tve-subject" id="tve-subject" onchange="toggleCode()"/>
                                                    </span>
                                                    <input type="text" class="form-control" placeholder="Leave unchecked to add as normal subject" readonly/>
                                            </div>                                            
                                        </div>
                                    </div>

                                    <div class="form-group" id="form-code">
                                        <label class="col-md-3 col-xs-12 control-label">Code</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-exclamation"></span></span>
                                                <input type="text" class="form-control" name="code" id="code" required/>
                                            </div>                                            
                                            <span class="help-block text-info">Example: FIL</span>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Description</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" class="form-control" name="description" id="description" required/>
                                            </div>            
                                            <span class="help-block text-info">Example: Filipino</span>
                                        </div>
                                    </div>

                                    <div class="form-group hidden" id="form-grade-level">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Applicable for</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                                <select class="form-control" name="grade-level" id="grade-level">
                                                    <option>Grade 7</option>
                                                    <option>Grade 8</option>
                                                    <option>Grade 9</option>
                                                    <option>Grade 10</option>
                                                </select>
                                            </div>
                                            <span class="help-block text-info">Click text box to see other options</span>
                                        </div>
                                    </div>      

                                    <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Added By</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                                <input type="text" class="form-control" name="added-by" id="added-by" value="{{ \Auth::user()->first_name }} {{ \Auth::user()->last_name }}" required readonly/>                                            
                                            </div>
                                            <span class="help-block text-info">Field will be auto populated.</span>
                                        </div>
                                    </div>
                            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" id="close-modal">Close</button>
                <button type="button" class="btn btn-primary" onClick="submitForm()" id="save-subject">Save changes</button>
            </div>
        </form>
        </div>
    </div>
</div>
@stop

@section('scripts')
<script type='text/javascript' src='/js/plugins/maskedinput/jquery.maskedinput.min.js'></script>
<script type="text/javascript" src="/js/plugins/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/js/plugins/bootstrap/bootstrap-datepicker.js"></script>   
<script type="text/javascript" src="/js/plugins/bootstrap/bootstrap-file-input.js"></script>
<script type="text/javascript" src="/js/plugins/bootstrap/bootstrap-select.js"></script>
<script type='text/javascript' src='/js/plugins/noty/jquery.noty.js'></script>
<script type='text/javascript' src='/js/plugins/noty/layouts/topCenter.js'></script>
<script type='text/javascript' src='/js/plugins/noty/layouts/topLeft.js'></script>
<script type='text/javascript' src='/js/plugins/noty/layouts/topRight.js'></script>            
<script type='text/javascript' src='/js/plugins/noty/themes/default.js'></script>


<script type="text/javascript">
function submitForm() {
    $(".form-subject").submit(function(e)
        {
            var formObj = $(this);
            var formURL = formObj.attr("action");
            var formData = new FormData(this);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: formURL,
                type: 'POST',
                data:  formData,
                mimeType:"multipart/form-data",
                contentType: false,
                cache: false,
                processData: false,
            success: function(data, textStatus, jqXHR)
            {
                alert(data);
                if (data == 'successfully added') $('#added').click();
                if (data == 'successfully updated') $('#updated').click();
                getSubjects();
                getTveSubjects();
                $('#close-modal').click();
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

<script type="text/javascript">
    $(document).ready(function(){
        getSubjects();
    });

    function getSubjects() {
        $.get("{{ URL::to('all-subjects') }}", function(data, status){
            subject = data;
            $('#subject-table tr').not(':first').remove();
            var html = "";
            $.each(data, function(index, subject){
                html +=
                '<tr>' +
                '<td>' + subject.code + '</td>' +
                '<td>' + subject.description + '</td>' +
                '<td>' + subject.created_at + '</td>' +
                '<td>' + subject.added_by + '</td>' +
                '<td>' + '<button class="btn btn-default btn-rounded btn-sm" onClick="edit_row(' + subject.id + ');">Edit &nbsp;<span class="fa fa-pencil"></span></button> &nbsp;' +
                            '<button class="btn btn-danger btn-rounded btn-sm" onClick="delete_row(' + subject.id + ');">Delete &nbsp;<span class="fa fa-times"></span>' +
                '</td>' +
                '</tr>';
            });
            $('#subject-table tr').first().after(html);
        });
    }
</script>


<script type="text/javascript">
    $(document).ready(function(){
        getTveSubjects();
    });

    function getTveSubjects() {
        $.get("{{ URL::to('all-tve-subjects') }}", function(data, status){
            tveSubject = data;
            $('#tve-subject-table tr').not(':first').remove();
            var html = "";
            $.each(data, function(index, tveSubject){
                html +=
                '<tr>' +
                '<td>' + tveSubject.description + '</td>' +
                '<td>' + tveSubject.grade_level + '</td>' +
                '<td>' + tveSubject.created_at + '</td>' +
                '<td>' + tveSubject.added_by + '</td>' +
                '<td>' + '<button class="btn btn-default btn-rounded btn-sm" onClick="edit_row(' + tveSubject.id + ');">Edit &nbsp;<span class="fa fa-pencil"></span></button> &nbsp;' +
                            '<button class="btn btn-danger btn-rounded btn-sm" onClick="delete_row(' + tveSubject.id + ');">Delete &nbsp;<span class="fa fa-times"></span>' +
                '</td>' +
                '</tr>';
            });
            $('#tve-subject-table tr').first().after(html);
        });
    }
</script>

<script type="text/javascript">
    function edit_row(id) {
        var formbody = $('.form-subject').html();
        $('.form-subject').html("<input type=\"hidden\" name=\"_method\" value=\"put\">" + formbody); 
        $('.form-subject').attr('action', 'subjects/' + id);

        $.each(subject, function(index, detail){
            if(detail.id == id) {
                $('#code').val(detail.code);
                $('#description').val(detail.description);
                $('#grade-level').val(detail.grade_level);
                $('#added-by').val(detail.added_by);
                $('.form-subject').attr('action', 'subjects/' + detail.id);
            }
        });
        $('#subject-modal-btn').click();
    }
</script>

<script type="text/javascript">
     function delete_row(id) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "/subjects/" + id, type: "delete", success: function(data) {
                $('.deleted').click();
                getSubjects();
            }, error: function(error) {
                $('.btn-warning').click();
            }
        });   
    }
</script>

<script type="text/javascript">
    function addSubject() {
        clearModal();
        $('div > h4').text('Add new subject');
        var savebtn = $('#save-subject');
        savebtn.text('Add new subject');
        savebtn.attr('onClick', 'saveSubject()');
        $('.form-subject').attr('action', 'subjects');
        $('#subject-modal-btn').click();
    }

    function saveSubject() {
        submitForm();
    }
</script>

<script type="text/javascript">
   function clearModal() {
         $('#code').val("");
        $('#description').val("");
        $('#grade-level').val('Grade 7');
   }

   function toggleCode(){
        if($('#tve-subject').is(':checked')) {
            $('#form-code').addClass('hidden');
            $('#form-grade-level').removeClass('hidden');
        } 
        else {
            $('#form-code').removeClass('hidden');
            $('#form-grade-level').addClass('hidden');
        }
   }
</script>
@stop