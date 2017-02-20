@extends('layouts/main')

@section('theme')
    
@stop

@section('breadcrumb')
<ul class="breadcrumb">
    <li class="active">Sections</li>
</ul>
@stop

@section('nav-sections') active @stop

@section('page-content-wrapper')
 <!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
<!-- START RESPONSIVE TABLES -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Sections Information</h3>
                        <div class="col-sm-12">
                            Filter by: &nbsp;&nbsp;&nbsp;
                            <label class="check"><input type="checkbox" class="icheckbox" name="filter-grade7"/>Grade 7</label>&nbsp;
                            <label class="check"><input type="checkbox" class="icheckbox" name="filter-grade8"/>Grade 8</label>&nbsp;
                            <label class="check"><input type="checkbox" class="icheckbox" name="filter-grade9"/>Grade 9</label>&nbsp;
                            <label class="check"><input type="checkbox" class="icheckbox" name="filter-grade10"/>Grade 10</label>&nbsp;
                            <button type="button" class="btn btn-sm btn-info" onClick="filter()">Go</button>
                            <button type="button" class="btn btn-info pull-right" data-toggle="modal" onClick="addSection()">Add new section</button>
                        </div>
                </div>

                <div class="panel-body panel-body-table">

                    <div class="table-responsive">
                        <table class="table table-bordered" id="section-table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Grade Level</th>
                                    <th>Section Order</th>
                                    <th>Added By</th>
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
    <button class="btn btn-success" onClick="noty({text: 'Section profile successfully added!', layout: 'topRight', type: 'success'});" id="added">Success</button>
    <button class="btn btn-success" onClick="noty({text: 'Section table successfully filtered!', layout: 'topRight', type: 'success'});" id="table-filtered">Success</button>
    <button class="btn btn-success" onClick="noty({text: 'Section profile successfully updated!', layout: 'topRight', type: 'success'});" id="updated">Success</button> 
    <button class="btn btn-danger" onClick="noty({text: 'There was an error', layout: 'topRight', type: 'error'});">Error</button> 
    <button class="btn btn-warning" onClick="noty({text: 'An error has occured, please try again later.', layout: 'topRight', type: 'warning'});">Warning</button> 
    <button class="deleted btn btn-info" onClick="noty({text: 'Section profile successfully deleted!', layout: 'topRight', type: 'information'});">Warning</button>
    <button class="btn btn-primary" onClick="notyConfirm();">Confirm</button>                                                                                  
</div>
@stop

@section('modals')
<button class="btn btn-primary hidden" data-toggle="modal" href='#section-modal' id="section-modal-btn">Trigger modal</button>
<div class="modal fade" id="section-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit section details</h4>
            </div>
            <div class="modal-body">
                <form class="form-section form-horizontal">
                {{ csrf_field() }}
                                 <blockquote class="blockquote-warning">
                                     <strong>Please double check fields before adding or saving section.</strong>
                                 </blockquote>                                   
                                <div class="panel-body form-group-separated">
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Name</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-exclamation"></span></span>
                                                <input type="text" class="form-control" name="name" id="name" required/>
                                            </div>                                            
                                            <span class="help-block text-warning">Section name is required</span>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Grade Level</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-exclamation"></span></span>
                                                <select class="form-control" name="grade-level" id="grade-level">
                                                    <option>Grade 7</option>
                                                    <option>Grade 8</option>
                                                    <option>Grade 9</option>
                                                    <option>Grade 10</option>
                                                </select>                                            
                                            </div>
                                            <span class="help-block text-info">Click on textbox to see other options</span>
                                        </div>
                                    </div>

                                    <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Section Order</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-exclamation"></span></span>
                                                <select class="form-control" name="section-order" id="section-order">
                                                    <option>Section 1</option><option>Section 2</option><option>Section 3</option>
                                                    <option>Section 4</option><option>Section 5</option><option>Section 6</option>
                                                    <option>Section 7</option><option>Section 8</option><option>Section 9</option>
                                                    <option>Section 10</option><option>Section 11</option><option>Section 12</option>
                                                </select>                                            
                                            </div>
                                            <span class="help-block text-info">Click on textbox to see other options</span>
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
                <button type="button" class="btn btn-primary" onClick="submitForm()" id="save-section">Save changes</button>
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
<script type='text/javascript' src='/js/plugins/noty/layouts/topCenter.js'></script>
<script type='text/javascript' src='/js/plugins/noty/layouts/topRight.js'></script>            
<script type='text/javascript' src='/js/plugins/noty/layouts/topLeft.js'></script>
<script type='text/javascript' src='/js/plugins/noty/themes/default.js'></script>
<script type='text/javascript' src='/js/plugins/noty/jquery.noty.js'></script>


<script type="text/javascript">
function submitForm() {
    $(".form-section").submit(function(e)
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
                getSections();
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
        $(".form-section").submit(); //Submit the form
}
</script>

<script type="text/javascript">
    $(document).ready(function(){
        getSections();
    });

    function getSections() {
        $.get("{{ URL::to('all-sections') }}", function(data, status){
            section = data;
            $('#section-table tr').not(':first').remove();
            var html = "";
            $.each(data, function(index, section){
                html +=
                '<tr>' +
                '<td>' + section.name + '</td>' +
                '<td>' + section.grade_level + '</td>' +
                '<td>' + section.order + '</td>' +
                '<td>' + section.added_by + '</td>' +
                '<td>' + '<button class="btn btn-default btn-rounded btn-sm" onClick="edit_row(' + section.id + ');">Edit &nbsp;<span class="fa fa-pencil"></span></button> &nbsp;' +
                            '<button class="btn btn-danger btn-rounded btn-sm" onClick="delete_row(' + section.id + ');">Delete &nbsp;<span class="fa fa-times"></span>' +
                '</td>' +
                '</tr>';
            });
            $('#section-table tr').first().after(html);
        });
    }
</script>

<script type="text/javascript">
    function edit_row(id) {
        var formbody = $('.form-section').html();
        $('.form-secion').html("<input type=\"hidden\" name=\"_method\" value=\"put\">" + formbody); 
        $('.form-section').attr('action', 'sections/' + id);

        $.each(section, function(index, detail){
            if(detail.id == id) {
                $('#name').val(detail.name);
                $('#section-order').val(detail.order);
                $('#grade-level').val(detail.grade_level);
                $('#added-by').val(detail.added_by);
                $('.form-section').attr('action', 'sections/' + detail.id);
            }
        });
        $('#section-modal-btn').click();
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
            url: "/sections/" + id, type: "delete", success: function(data) {
                $('.deleted').click();
                getTeachers();
            }, error: function(error) {
                $('.btn-warning').click();
            }
        });   
    }
</script>

<script type="text/javascript">
    function addSection() {
        clearModal();
        $('div > h4').text('Add new section');
        var savebtn = $('#save-section');
        savebtn.text('Add new section');
        savebtn.attr('onClick', 'saveSection()');
        $('.form-section').attr('action', 'sections');
        $('#section-modal-btn').click();
    }

    function saveSection() {
        submitForm();
    }
</script>

<script type="text/javascript">
   function clearModal() {
         $('#name').val("");
   }
</script>

<script type="text/javascript">
    // VARIABLES
    sectionOrder = "";
</script>

<script>
    function filter() {
        if($('input[name="filter-grade7"]').is(':checked')) { grade7 = 'grade7=Grade 7'; } else { grade7 = "grade7="; }
        if($('input[name="filter-grade8"]').is(':checked')) { grade8 = 'grade8=Grade 8'; } else { grade8 = "grade8="; }
        if($('input[name="filter-grade9"]').is(':checked')) { grade9 = 'grade9=Grade 9'; } else { grade9 = "grade9="; }
        if($('input[name="filter-grade10"]').is(':checked')) { grade10 = 'grade10=Grade 10'; } else { grade10 = "grade10="; }
        if(grade7 == "grade7=" && grade8 == "grade8=" && grade9 == "grade9=" && grade10 == "grade10=") getSections();

        var query = grade7 + '&' + grade8 + '&' + grade9 + '&' + grade10;

         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "/filter-section/?" + query, type: "get", success: function(data) {
                $('#section-table tr').not(':first').remove();
                var html = "";
                $.each(data, function(index, detail){
                        html +=
                        '<tr>' + 
                        '<td>' + detail.name + '</td>' +
                        '<td>' + detail.grade_level + '</td>' +
                        '<td>' + detail.order + '</td>' +
                        '<td>' + detail.added_by + '</td>' +
                        '<td>' + '<button class="btn btn-default btn-rounded btn-sm" onClick="edit_row(' + detail.id + ');">Edit &nbsp;<span class="fa fa-pencil"></span></button> &nbsp;' +
                                    '<button class="btn btn-danger btn-rounded btn-sm" onClick="delete_row(' + detail.id + ');">Delete &nbsp;<span class="fa fa-times"></span>' +
                        '</td>' +
                        '</tr>';
                });
                $('#section-table tr').first().after(html);
            }, error: function(error) {
                $('.btn-warning').click();
            }
        });   
    }
</script>
@stop