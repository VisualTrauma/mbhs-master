@extends('layouts/main')



@section('breadcrumb')
<ul class="breadcrumb">
    <li class="active">Users Accounts</li>
</ul>
@stop

@section('nav-users') active @stop

@section('page-content-wrapper')
 <!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
<!-- START RESPONSIVE TABLES -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">

                <div class="panel-heading">
                    <h3 class="panel-title">User Accounts</h3>
                    <button type="button" class="btn btn-info pull-right" data-toggle="modal" onClick="addUser()">Add new account</button>
                </div>

                <div class="panel-body panel-body-table">

                    <div class="table-responsive">
                        <table class="table table-bordered" id="user-table">
                            <thead>
                                <tr>
                                                    <th>First Name</th>
                                                    <th>Last Name</th>
                                                    <th>Designation</th>
                                                    <th>Access Level</th>
                                                    <th>Contact No.</th>
                                                    <th>Username</th>
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
    <button class="btn btn-success" onClick="noty({text: 'User profile successfully added!', layout: 'topRight', type: 'success'});" id="added">Success</button>
    <button class="btn btn-success" onClick="noty({text: 'User profile successfully updated!', layout: 'topRight', type: 'success'});" id="updated">Success</button> 
    <button class="btn btn-danger" onClick="noty({text: 'There was an error', layout: 'topRight', type: 'error'});">Error</button> 
    <button class="btn btn-warning" onClick="noty({text: 'An error has occured, please try again later.', layout: 'topRight', type: 'warning'});">Warning</button> 
    <button class="deleted btn btn-info" onClick="noty({text: 'User profile successfully deleted!', layout: 'topRight', type: 'information'});">Warning</button>
    <button class="btn btn-primary" onClick="notyConfirm();">Confirm</button>                                                                                  
</div>
@stop

@section('modals')
<button class="btn btn-primary hidden" data-toggle="modal" href='#user-modal' id="user-modal-btn">Trigger modal</button>
<div class="modal fade" id="user-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit user profile</h4>
            </div>
            <div class="modal-body">
                <form class="form-user form-horizontal">
                {{ csrf_field() }}
                                 <blockquote class="blockquote-warning">
                                     <strong>Please double check fields before adding or saving profile.
                                     Default password will be the same as user's username.</strong>
                                 </blockquote>                                   
                                <div class="panel-body form-group-separated">
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">First Name</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                                <input type="text" class="form-control" name="first-name" id="first-name" required/>
                                            </div>                                            
                                            <span class="help-block text-warning">First name is required</span>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Last Name</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                                <input type="text" class="form-control" name="last-name" id="last-name" required/>
                                            </div>            
                                            <span class="help-block text-warning">Last name is required</span>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Designation</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                                <input type="text" class="form-control" name="designation" id="designation" required/>                                            
                                            </div>
                                            <span class="help-block text-warning">Designation is required</span>
                                        </div>
                                    </div>

                                     <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Access Level</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-exclamation"></span></span>
                                                <select class="form-control" name="access-level" id="access-level">
                                                    <option>Normal</option>
                                                    <option>Registrar</option>
                                                    <option>Admin</option>
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
                                                <input type="text" class="form-control" name="contact-number" id="contact-number" required/>                                            
                                            </div>
                                            <span class="help-block text-warning">Contact number is required</span>
                                        </div>
                                    </div>

                                    <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Username</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-lock"></span></span>
                                                <input type="text" class="form-control" name="username" id="username" required/>                                            
                                            </div>
                                            <span class="help-block text-warning">Username is required</span>
                                        </div>
                                    </div>

                            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" id="close-modal">Close</button>
                <button type="button" class="btn btn-primary" onClick="submitForm()" id="save-user">Save changes</button>
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
    $(".form-user").submit(function(e)
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
                type: 'post',
                data:  formData,
                mimeType:"multipart/form-data",
                contentType: false,
                cache: false,
                processData: false,
            success: function(data, textStatus, jqXHR)
            {
                if (data == 'successfully added') $('#added').click();
                if (data == 'successfully updated') $('#updated').click();
                getUsers();
                closeModal();
            },
             error: function(jqXHR, textStatus, errorThrown) 
             {
                $('.btn-warning').click();
             }          
            });
            e.preventDefault(); //Prevent Default action. 
            e.unbind();
        }); 
        $(".form-user").submit(); //Submit the form
}
</script>

<script type="text/javascript">
    $(document).ready(function(){
        getUsers();
    });

    function getUsers() {
        $.get("{{ URL::to('all-users') }}", function(data, status){
            user = data;
            $('#user-table tr').not(':first').remove();
            var html = "";
            $.each(data, function(index, user){
                html +=
                checkuser(user.deleted_at, user.username) +
                '<td>' + user.first_name + '</td>' +
                '<td>' + user.last_name + '</td>' +
                '<td>' + user.designation + '</td>' +
                '<td>' + user.access_level + '</td>' +
                '<td>' + user.contact_number + '</td>' +
                '<td>' + user.username + '</td>' +
                '<td>' + '<button class="btn btn-default btn-rounded btn-sm" onClick="edit_row(' + user.id + ');">Edit &nbsp;<span class="fa fa-pencil"></span></button> &nbsp;' +
                            '<button class="btn btn-danger btn-rounded btn-sm" onClick="delete_row(' + user.id + ');">Delete &nbsp;<span class="fa fa-times"></span></button>' +
                '</td>' +
                '</tr>';
            });
            $('#user-table tr').first().after(html);
        });
    }
</script>

<script type="text/javascript">
    function edit_row(id) {
        var formbody = $('.form-user').html();
        $('.form-user').html("<input type=\"hidden\" name=\"_method\" value=\"put\">" + formbody);
        $('.form-user').attr('action', 'users/' + id);

        $.each(user, function(index, detail){
            if(detail.id == id) {
                $('#first-name').val(detail.first_name);
                $('#last-name').val(detail.last_name);
                $('#designation').val(detail.designation);
                $('#access-level').val(detail.access_level);
                $('#contact-number').val(detail.contact_number);
                $('#username').val(detail.username);
            }
        });
        $('#user-modal-btn').click();
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
            url: "/users/" + id, type: "delete", success: function(data) {
                $('.deleted').click();
                getUsers();
            }, error: function(error) {
                $('.btn-warning').click();
            }
        });   
    }
</script>

<script type="text/javascript">
    function addUser() {
        clearModal();
        $('div > h4').text('Add new user profile');
        var savebtn = $('#save-user');
        savebtn.text('Add new profile');
        savebtn.attr('onClick', 'saveUser()');
        $('.form-user').attr('action', 'users');
        $('#user-modal-btn').click();
    }

    function saveUser() {
        submitForm();
    }
</script>

<script type="text/javascript">
   function clearModal() {
         $('#first-name').val("");
        $('#middle-name').val("");
        $('#designation').val("");
        $('#contact-number').val("");
        $('#username').val("");
   }

   function closeModal() {
        $('#close-modal').click();
   }
</script>

<script type="text/javascript">
    function checkuser(status, username) {
       if (status == null) return '<tr class="warning">';
       else return '<tr>';
    }
</script>
@stop