@extends('layouts.master')
@extends('box.project.projects')
@section('title')
    Running Project
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6">
            <p><button type="button" class="btn btn-primary btn-labeled" data-toggle="modal" data-target="#myModal"><b><i class="icon-file-plus"></i></b> Add New Project</button></p>
        </div>
        <div class="col-md-6"></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-flat border-top-success">
                <div class="panel-heading">
                    <h6 class="panel-title">Running Projects</h6>
                </div>

                <div class="panel-body">
                    <table class="table table-bordered table-condensed table-hover table-striped datatable">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Name</th>
                            <th>Balance</th>
                            <th>Status</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($table as $row)
                            <tr>
                                <td>{{$row->projectID}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{money($row->balance)}}</td>
                                <td><a class="btn btn-xs btn-primary p-0" href="{{action('ProjectsController@complete', ['id' => $row->projectID])}}"  onclick="return confirm('Are you sure to end the project?')" title="End">{{$row->status}}</a></td>
                                <td class="text-right">
                                    <a class="btn btn-xs btn-success no-padding mr-5" href="{{action('Project\ProjectController@index', ['id' => $row->projectID])}}"  title="Go to project"><i class="icon-arrow-right16"></i></a>
                                    <button class="btn btn-xs btn-success no-padding mr-5 ediBtn" data-name="{{$row->name}}"data-id="{{$row->projectID}}"  data-toggle="modal" data-target="#ediModal" title="Edit"><i class="icon-pencil5"></i></button>
                                    <a class="btn btn-xs btn-danger no-padding" href="{{action('ProjectsController@del', ['id' => $row->projectID])}}"  onclick="return confirm('Are you sure to delete?')" title="Delete"><i class="icon-bin"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

    <script src="{{asset('public/js/jquery.geocomplete.min.js')}}" type="text/javascript"></script>

    <script type="text/javascript">

        $(function () {

            $('.datatable').DataTable({
                order: [[ 0, "desc" ]],
                columnDefs: [
                    { orderable: false, "targets": [2] }//For Column Order
                ]
            });
        });

        $(function () {
            $('.ediBtn').click(function () {
                var id = $(this).data('id');
                var name = $(this).data('name');


                $('#ediID').val(id);
                $('#ediModal [name=name]').val(name);

            });
        });



    </script>

@endsection