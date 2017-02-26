@extends('layouts/main')

@section('breadcrumb')
<ul class="breadcrumb">
    <li class="active">Reports</li>
</ul>
@stop

@section('nav-reports') active @stop
@section('nav-reports-enrollment') active @stop

@section('page-content-wrapper')
<div class="page-title">
    <h2><span class="fa fa-info-circle"></span> Enrollment <small>101 enrolled</small></h2>
</div>


<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-body">
                    <p>Use search to find student. You can search by: name, lrn</p>
                    <div class="form-group">
                        <form class="" action="{{ url('reports/enrollment') }}" method="GET">
                        <div class="col-md-12">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <span class="fa fa-search"></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Who are you looking for?" name="search" value=""/>
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <div class="row">
            <div class="col-md-12">
                <!-- START BORDERED TABLE SAMPLE -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Assessment</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped" id="table-application">
                            <thead>
                                <tr>
                                    <th>LRN</th>
                                    <th>Name</th>
                                    <th>Grade Level</th>
                                    <th>Section</th>
                                    <th with="120">Assessment</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($enrollments as $enrollment)
                                    <tr>
                                        <td><code>{{ $enrollment->student->lrn }}</code></td>
                                        <td><a href="{{ route('students.show', $enrollment->student_id) }}">{{ $enrollment->student->first_name . ' ' . $enrollment->student->last_name }}</a></td>
                                        <td>{{ $enrollment->grade_level }}</td>
                                        <td>{{ $enrollment->section->name }}</td>
                                        <td>
                                            <button class="btn btn-primary btn-rounded btn-sm" onclick="location.href='{{ url('reports/enrollment/' . $enrollment->id) }}';">Print</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END BORDERED TABLE SAMPLE -->
            </div>
        </div>

</div>
@endsection
