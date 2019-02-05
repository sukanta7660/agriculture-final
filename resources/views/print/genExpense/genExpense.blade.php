@extends('layouts.print')

@section('title')
    Expanse Reports
@endsection

@section('content')

    <!-- invoice template -->

    <div class="bg-white border-radius p-5">
        <div class="row hidden-print">
            <div class="col-xs-6 mt-10"><h6 class="m-5"><i class="icon-printer"></i> Expanse Reports</h6></div>
            <div class="col-xs-6 mt-10 text-right">
                <button type="button" class="btn btn-danger btn-xs heading-btn" onclick="history.go(-1)"><i class="icon-arrow-left16 position-left"></i> Go Back</button>
                <button type="button" class="btn btn-success btn-xs heading-btn" onclick="window.print()"><i class="icon-printer position-left"></i> Print</button>
            </div>
            <div class="col-xs-12"><hr class="mt-10 mb-10" /></div>
        </div>


        <div class="row">
            <div class="col-xs-12"><h5 class="text-center no-margin">Expanse Reports</h5></div>
        </div>
        <div class="row">
            <div class="col-xs-8"><b class="no-margin">Date: </b>{{$date_rang}}</div>
            <div class="col-xs-4 text-right"><b class="no-margin">Report Date: </b>{{date("d/m/Y") }}</div>
        </div>
        <div class="row">
            <div class="col-xs-12"><hr class="mt-10 mb-10" /></div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <table class="table table-bordered table-condensed">
                    <thead>
                    <tr>
                        <th class="p-5 pt-0 pb-0 no-padding-top">Date</th>
                        <th class="p-5 pt-0 pb-0 ">Expanse Category</th>
                        <th class="p-5 pt-0 pb-0 ">Description</th>
                        <th class="p-5 pt-0 pb-0 text-right">Amount</th>
                    </tr>
                    </thead>
                    <tbody class="text-size-mini">
                    @php
                        $balance = 0;

                    @endphp
                    @foreach($table as $row)

                        <tr>
                            <td class="p-5 pt-0 pb-0 ">{{pub_date($row->created_at)}}</td>
                            <td class="p-5 pt-0 pb-0 ">{{$row->generalexp['name']}}</td>
                            <td class="p-5 pt-0 pb-0 ">{{$row->descriptions}}</td>
                            <td class="p-5 pt-0 pb-0 text-right">{{money($row->amountOut)}}</td>
                        </tr>

                        @php
                            $balance += $row->amountOut;
                        @endphp

                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th class="p-5 pt-0 pb-0 text-right" colspan="3">Total</th>
                        <th class="p-5 pt-0 pb-0 text-right">{{money($balance)}}</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>

    </div>



@endsection
