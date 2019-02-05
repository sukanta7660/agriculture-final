@extends('layouts.master')
@extends('box.assets.assets')
@section('title')
    Assets
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6">
            <p><button type="button" class="btn btn-primary btn-labeled" data-toggle="modal" data-target="#myModal"><b><i class="icon-file-plus"></i></b> Buy Asset</button></p>
        </div>
        <div class="col-md-6">
            @php
                $total = 0;
            @endphp
            @foreach($table as $row)
                @php
                    $total += $row->amount;
                @endphp
            @endforeach
            <h4 class="text-right text-primary text-bold">Total Amount: {{money($total)}}</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-flat border-top-success">
                <div class="panel-heading">
                    <h6 class="panel-title">All Assets</h6>
                </div>

                <div class="panel-body">
                    <table class="table table-bordered table-condensed table-hover table-striped datatable">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Date</th>
                            <th>Asset Name</th>
                            <th class="text-right">Price</th>
                            <th>Description</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($table as $row)
                            <tr>
                                <td>{{$row->assetID}}</td>
                                <td>{{pub_date($row->created_at)}}</td>
                                <td>{{$row->name}}</td>
                                <td class="text-right">{{money($row->amount)}}</td>
                                <td >{{$row->description}}</td>
                                <td class="text-right">
                                    <button class="btn btn-xs btn-success no-padding mr-5 ediBtn" data-name="{{$row->name}}" data-id="{{$row->assetID}}" data-price="{{$row->amount}}" data-descr="{{$row->description}}" data-toggle="modal" data-target="#ediModal" title="Edit"><i class="icon-pencil5"></i></button>
                                    <a class="btn btn-xs btn-danger no-padding" href="{{action('Asset\AssetController@del', ['id' => $row->assetID])}}"  onclick="return confirm('Are you sure to delete?')" title="Delete"><i class="icon-bin"></i></a>
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
                var price = $(this).data('price');
                var descr = $(this).data('descr');

                $('#ediID').val(id);
                $('#ediModal [name=name]').val(name);
                $('#ediModal [name=amount]').val(price);
                $('#ediModal [name=description]').val(descr);

            });
        });



    </script>

@endsection