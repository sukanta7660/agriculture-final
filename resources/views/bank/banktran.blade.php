@extends('layouts.master')
@extends('box.bank.banktran')
@section('title')
    Bank Transaction
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6 mb-5">
                    <button type="button" class="btn btn-primary btn-labeled" data-toggle="modal" data-target="#depositModal"><b><i class="icon-file-plus"></i></b> Cash In Amount</button>
                    <button type="button" class="btn btn-warning btn-labeled" data-toggle="modal" data-target="#withdrawModal"><b><i class="icon-file-minus"></i></b> Cash Out Amount</button>
                </div>
                <div class="col-md-6">
                    @php
                        $totalIn = 0;
                        $totalOut = 0;
                    @endphp
                    @foreach($table as $row)
                        @php
                            $totalIn += $row->amountIN;
                            $totalOut += $row->amountOut;
                        @endphp
                    @endforeach
                    @php
                        $total = $totalIn - $totalOut;
                    @endphp
                    <h4 class="text-right text-primary text-bold">Total Balance: {{money($total)}}</h4>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-flat border-top-success">
                <div class="panel-heading">
                    <h6 class="panel-title">All Bank Transaction</h6>
                </div>

                <div class="panel-body">
                    <table class="table table-bordered table-condensed table-hover table-striped datatable">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Date</th>
                            <th>Bank</th>
                            <th>A/C</th>
                            <th>Deposit Amount</th>
                            <th>Withdraw Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($table as $row)
                            <tr>
                                <td>{{$row->bankbookID}}</td>
                                <td>{{pub_date($row->created_at)}}</td>
                                <td>{{$row->bank['name']}}</td>
                                <td>{{ac_type($row->bank['accountNo'])}}</td>
                                <td>{{money($row->amountIN)}}</td>
                                <td>{{money($row->amountOut)}}</td>
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

    </script>

@endsection