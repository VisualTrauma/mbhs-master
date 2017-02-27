@extends('layouts/main')

@section('breadcrumb')
<ul class="breadcrumb">
    <li class="active">Reports</li>
</ul>
@stop

@section('nav-reports') active @stop
@section('nav-reports-teacher-list') active @stop

@section('page-content-wrapper')
 <!-- PAGE CONTENT WRAPPER -->

<div class="page-content-wrap" >

    <div class="row">
        <div class="col-md-12">

            <form class="form-horizontal" method="GET" action="/reports/teachers-list" id="form-filter">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Filter</strong> Result</h3>
                    </div>
                    <div class="panel-body">

                        <div class="form-group" style="margin-top: 20px;">
                            <label class="col-md-3 col-xs-12 control-label">Taching Area</label>
                            <div class="col-md-6 col-xs-12">
                                <select class="form-control select" name="teaching_area">
                                    <option value="">All</option>
                                    <option value="First Floor"@if(request('teaching_area') == 'First Floor') selected @endif>First Floor</option>
                                    <option value="Second Floor"@if(request('teaching_area') == 'Second Floor') selected @endif>Second Floor</option>
                                    <option value="Third Floor"@if(request('teaching_area') == 'Third Floor') selected @endif>Third Floor</option>
                                    <option value="Fourth Floor"@if(request('teaching_area') == 'Fourth Floor') selected @endif>Fourth Floor</option>
                                </select>
                            </div>
                        </div>

                        <div class="pull-right">
                            <button class="btn btn-primary" type="submit">Filter</button>
                        </div>

                    </div>
                </div>
            </form>

        </div>
    </div>


    <div class="row" >

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="pull-right">
                        <button class="btn btn-default" onclick="print()" id="print-button"><span class="fa fa-print"></span> Print</button>
                    </div>
                </div>
                <div class="panel-body">
                    <p style="text-align: center;"><img src="data:image/jpeg;base64,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" data-filename="mbhs_logo.jpg" style="width: 100px; float: none;"></p>
                    <h3 style="text-align: center;">Muntinlupa Business High School</h3>
                    <p style="text-align: center; line-height:5px;">Espeleta St. Buli, Muntinlupa City</p>
                    <p style="text-align: center; line-height:5px;">Telephone No: 850-9479</p>

                    <div class="panel-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Teaching Area</th>
                                    <th>Contact Number</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($teachers as $teacher)
                                    <tr>
                                        <td>{{ $teacher->id }}</td>
                                        <td>{{ $teacher->first_name . ' ' . $teacher->last_name }}</td>
                                        <td>{{ $teacher->teaching_area }}</td>
                                        <td>{{ $teacher->contact_number }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <p><h4 style="text-align: center;">*** Nothing Follows ***</h4></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3" style="position: relative;">
            <div id="tocify"></div>
        </div>

    </div>
</div>
<!-- END PAGE CONTENT WRAPPER -->
@stop


@section('scripts')
<script type="text/javascript" src="/js/plugins/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/js/plugins/bootstrap/bootstrap-select.js"></script>
<script>
    function print() {
        var form = $("#form-filter");
        form.attr({
            "action": "{{ url('reports/print/teachers-list') }}",
            "target": "_blank"
        });
        form.submit();
        form.attr("action", "{{ url('reports/teachers-list') }}");
        form.removeAttr("target");
    }
</script>
@stop
