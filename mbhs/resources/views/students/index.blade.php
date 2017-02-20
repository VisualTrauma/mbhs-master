@extends('layouts/main')



@section('breadcrumb')
<ul class="breadcrumb">
    <li class="active">Students</li>                    
</ul>
@stop

@section('nav-students') active @stop

@section('page-content-wrapper')
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
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
                <form action="{{ URL::to('students/delete') }}" method="post">
                {{ csrf_field() }} {{ method_field('delete') }}
                    <p align="center">
                        <button type="submit" class="btn btn-primary">Delete Student Information Here</button>
                    </p>
                </form>
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
                },
                {
                    "targets": 6,
                    "render": function ( data, type, row ) {
                        return 'Grade ' + data;
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