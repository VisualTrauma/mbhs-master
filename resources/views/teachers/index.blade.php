@extends('layouts/main')

@section('breadcrumb')
<ul class="breadcrumb">
    <li class="active">Teachers</li>
</ul>
@stop

@section('nav-teachers') active @stop

@section('page-content-wrapper')
 <!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
<!-- START RESPONSIVE TABLES -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <button type="button" class"btn btn-info">sample</button>
                    <button type="button" class="btn btn-info pull-right" data-toggle="modal" onClick="addTeacher()">Add new teacher profile</button>
                </div>

                <div class="panel-body panel-body-table">

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-actions" id="teacher-table">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Middle Name</th>
                                    <th>Last Name</th>
                                    <th>Teaching Area</th>
                                    <th>Contact No.</th>
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
    </div>
    <!-- END RESPONSIVE TABLES -->
<!-- END PAGE CONTENT WRAPPER -->                                    
</div>         
@stop

@section('noty')
<div class="form-group hidden">                                            
    <button class="btn btn-success" onClick="noty({text: 'Teacher profile successfully added!', layout: 'topRight', type: 'success'});" id="added">Success</button>
    <button class="btn btn-success" onClick="noty({text: 'Teacher profile successfully updated!', layout: 'topRight', type: 'success'});" id="updated">Success</button> 
    <button class="btn btn-danger" onClick="noty({text: 'There was an error', layout: 'topRight', type: 'error'});">Error</button> 
    <button class="btn btn-warning" onClick="noty({text: 'An error has occured, please try again later.', layout: 'topRight', type: 'warning'});">Warning</button> 
    <button class="deleted btn btn-info" onClick="noty({text: 'Teacher profile successfully deleted!', layout: 'topRight', type: 'information'});">Warning</button>
    <button class="btn btn-primary" onClick="notyConfirm();">Confirm</button>                                                                                  
</div>
@stop

@section('modals')
<button class="btn btn-primary hidden" data-toggle="modal" href='#edit-teacher' id="teacher-modal">Trigger modal</button>
<div class="modal fade" id="edit-teacher">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit teacher profile</h4>
            </div>
            <div class="modal-body">
                <form class="form-teacher form-horizontal">
                {{ csrf_field() }}
                                 <blockquote class="blockquote-warning">
                                     <strong>Please double check fields before adding or saving profile.</strong>
                                 </blockquote>                                   
                                <div class="panel-body form-group-separated">
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">First Name</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                                <input type="text" class="form-control" name="first-name" id="efirst-name" required/>
                                            </div>                                            
                                            <span class="help-block text-warning">First name is required</span>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Middle Name</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                                <input type="text" class="form-control" name="middle-name" id="emiddle-name" required/>
                                            </div>            
                                            <span class="help-block text-info">Middle name is optional</span>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Last Name</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                                <input type="text" class="form-control" name="last-name" id="elast-name" required/>                                            
                                            </div>
                                            <span class="help-block text-warning">Last name is required</span>
                                        </div>
                                    </div>

                                    <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Teaching Area</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-exclamation"></span></span>
                                                <select class="form-control" name="teaching-area" id="eteaching-area">
                                                    <option>First floor</option>
                                                    <option>Second floor</option>
                                                    <option>Third floor</option>
                                                    <option>Fourth floor</option>
                                                </select>                                            
                                            </div>
                                            <span class="help-block text-info">Click on textbox to see other options</span>
                                        </div>
                                    </div>

                                    <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Contact Number</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-phone"></span></span>
                                                <input type="text" class="form-control" name="contact-number" id="econtact-number" required/>                                            
                                            </div>
                                            <span class="help-block text-warning">Contact number is required</span>
                                        </div>
                                    </div>
                            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" id="close-modal">Close</button>
                <button type="button" class="btn btn-primary" onClick="submitForm()" id="save-teacher">Save changes</button>
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
    $(".form-teacher").submit(function(e)
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
                if (data == 'successfully added') $('#added').click();
                if (data == 'successfully updated') $('#updated').click();
                getTeachers();
                $('#close-modal').click();
            },
             error: function(jqXHR, textStatus, errorThrown) 
             {
                $('.btn-warning').click();
             }          
            });
            e.preventDefault(); //Prevent Default action. 
            e.unbind();
        }); 
        $(".form-teacher").submit(); //Submit the form
}
</script>

<script type="text/javascript">
    $(document).ready(function(){
        getTeachers();
    });

    function getTeachers() {
        $.get("{{ URL::to('all-teachers') }}", function(data, status){
            teacher = data;
            $('#teacher-table tr').not(':first').remove();
            var html = "";
            $.each(data, function(index, teacher){
                html +=
                '<tr>' +
                '<td>' + teacher.first_name + '</td>' +
                '<td>' + checkMiddleName(teacher.middle_name) + '</td>' +
                '<td>' + teacher.last_name + '</td>' +
                '<td>' + teacher.teaching_area + '</td>' +
                '<td>' + teacher.contact_number + '</td>' +
                '<td>' + '<button class="btn btn-default btn-rounded btn-sm" onClick="edit_row(' + teacher.id + ');">Edit &nbsp;<span class="fa fa-pencil"></span></button> &nbsp;' +
                            '<button class="btn btn-danger btn-rounded btn-sm" onClick="delete_row(' + teacher.id + ');">Delete &nbsp;<span class="fa fa-times"></span>' +
                '</td>' +
                '</tr>';
            });
            $('#teacher-table tr').first().after(html);
        });
    }
</script>

<script type="text/javascript">
    function edit_row(id) {
        var formbody = $('.form-teacher').html();
        $('.form-teacher').html("<input type=\"hidden\" name=\"_method\" value=\"put\">" + formbody); 
        $('.form-teacher').attr('action', 'teachers/' + id);

        $.each(teacher, function(index, detail){
            if(detail.id == id) {
                $('#efirst-name').val(detail.first_name);
                if(detail.middle_name == null) { $('#emiddle-name').val(""); }
                else { $('#emiddle-name').val(detail.middle_name); }
                $('#elast-name').val(detail.last_name);
                $('#eteaching-area').val(detail.teaching_area);
                $('#econtact-number').val(detail.contact_number);
                $('.edit-teacher').attr('action', 'teachers/' + detail.id);
            }
        });
        $('#teacher-modal').click();
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
            url: "/teachers/" + id, type: "delete", success: function(data) {
                $('.deleted').click();
                getTeachers();
            }, error: function(error) {
                $('.btn-warning').click();
            }
        });   
    }
</script>

<script type="text/javascript">
    function addTeacher() {
        clearModal();
        $('div > h4').text('Add new teacher profile');
        var savebtn = $('#save-teacher');
        savebtn.text('Add new profile');
        savebtn.attr('onClick', 'saveTeacher()');
        $('.form-teacher').attr('action', 'teachers');
        $('#teacher-modal').click();
    }

    function saveTeacher() {
        submitForm();
    }
</script>

<script type="text/javascript">
   function clearModal() {
         $('#efirst-name').val("");
        $('#emiddle-name').val("");
        $('#elast-name').val("");
        $('#econtact-number').val("");
   }
</script>

<script type="text/javascript">
    function checkMiddleName(middleName) {
            if(middleName == null) {
                return "";
            } else {
                return middleName;
            }
    }
</script>
@stop