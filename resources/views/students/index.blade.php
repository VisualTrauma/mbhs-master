@extends('layouts/main')

@section('breadcrumb')
<ul class="breadcrumb">
    <li class="active">Students</li>                    
</ul>
@stop

@section('nav-students') active @stop

@section('css')
<style>
.alert {
  float: left;
  max-width: 350px;
  width: 100%;
  margin-right: 20px;
  line-height: 21px;
  position: fixed;
  bottom: 0;
  right: 0;
  z-index: 10;
}
</style>
@stop

@section('page-content-wrapper')
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
@if(session('success'))
    @include('layouts.success')
@endif
    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal">
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
                                    <th>Last Name</th>
                                    <th>Status</th>
                                    <th>Grade level</th>
                                    </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <!-- END DEFAULT DATATABLE -->                                                                          
            </form>
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
                <p align="center"><span class="green">-You can-</span></p>
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
                    <p align="center"><span class="green">-OR-</span></p>
                </form>
                    <p align="center">
                        <a href="#" class="mb-control btn btn-primary" data-box="#mb-delete">Delete Student Information Here</a>
                    </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                {{--<button type="button" class=e"btn btn-primary">Save changes</button>--}}
            </div>

        </div>
    </div>
</div>
@stop

@section('scripts')
<script type="text/javascript" src="js/plugins/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript">
	$('.xn-search').hide();
</script>

<script>
$clickedRow = $('.datatable').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "{{ URL::to('all_students.php') }}",
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
            $('#form-delete').attr('action', 'students/' + $currentRowData[0]);
            $('#modal-button').trigger('click');
        });
</script>
@stop

@section('message-box')
<!-- MESSAGE BOX-->
<div class="message-box animated fadeIn" data-sound="alert" id="mb-delete">
    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title"><span class="fa fa-trash"></span><strong>Student deletion cannot be undone</strong>!</div>
            <div class="mb-content">
                <p>If you accidentally clicked delete button, ignore this message and click 'No'</p><br>
                <p>Clicking yes will permanently delete student record!</p>
            </div>
            <div class="mb-footer">
                <div class="pull-right">
                    <form method="post" id="form-delete">
                     {{ csrf_field() }} {{ method_field('delete') }}
                        <button type="submit" class="btn btn-success btn-lg">Yes</button>
                        <button class="btn btn-default btn-lg mb-control-close">No</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MESSAGE BOX-->
@stop