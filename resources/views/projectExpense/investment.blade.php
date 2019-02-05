@extends('layouts.project')
@extends('box.projectExpense.investment')
@section('title')
    Investment
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6">
            <p><button type="button" class="btn btn-primary btn-labeled" data-toggle="modal" data-target="#myModal"><b><i class="icon-file-plus"></i></b> New Invest</button></p>
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
                    <h6 class="panel-title">All Investment</h6>
                </div>

                <div class="panel-body">
                    <table class="table table-bordered table-condensed table-hover table-striped datatable">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Description</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($table as $row)
                            <tr>
                                <td>{{$row->investmentID}}</td>
                                <td>{{pub_date($row->created_at)}}</td>
                                <td>{{money($row->amount)}}</td>
                                <td>{{$row->description}}</td>
                                <td class="text-right">
                                    <button class="btn btn-xs btn-success no-padding mr-5 ediBtn" data-amount="{{$row->amount}}" data-id="{{$row->investmentID}}" data-des="{{$row->description}}"  data-toggle="modal" data-target="#ediModal" title="Edit"><i class="icon-pencil5"></i></button>
                                    <a class="btn btn-xs btn-danger no-padding" href="{{action('Project\InvestController@del', ['id' => $row->investmentID])}}"  onclick="return confirm('Are you sure to delete?')" title="Delete"><i class="icon-bin"></i></a>
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
                var des = $(this).data('des');
                var amount = $(this).data('amount');


                $('#ediID').val(id);
                $('#ediModal [name=amount]').val(amount);
                $('#ediModal [name=description]').val(des);

            });
        });



    </script>

@endsection