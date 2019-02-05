@extends('layouts.print')

@section('title')
    Full Project Overview
@endsection

@section('content')

    <!-- invoice template -->

    <div class="bg-white border-radius p-5">
        <div class="row hidden-print">
            <div class="col-xs-6 mt-10"><h6 class="m-5"><i class="icon-printer"></i> Investment Reports</h6></div>
            <div class="col-xs-6 mt-10 text-right">
                <button type="button" class="btn btn-danger btn-xs heading-btn" onclick="history.go(-1)"><i class="icon-arrow-left16 position-left"></i> Go Back</button>
                <button type="button" class="btn btn-success btn-xs heading-btn" onclick="window.print()"><i class="icon-printer position-left"></i> Print</button>
            </div>
            <div class="col-xs-12"><hr class="mt-10 mb-10" /></div>
        </div>

        <div class="row">
            <div class="col-xs-12"><h5 class="text-center no-margin">Full Report for <strong class="text-uppercase">{{$table->name}} </strong></h5></div>
        </div>
        <!-- start investment report for complate project -->

        <div class="row">
            <div class="col-xs-8"><b class="no-margin">Start:</b> {{pub_date($table->created_at)}} | <b class="no-margin">End:</b> {{pub_date($table->ending)}}</div>
            <div class="col-xs-4 text-right"><b class="no-margin">Report Date: </b>{{date("d/m/Y") }}</div>
        </div>
        <div class="row">
            <div class="col-xs-12"><hr class="mt-10 mb-10" /></div>
        </div>
        <div class="row">
            <div class="col-xs-12"><h5 class="text-center no-margin">Investment Report</h5></div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <table class="table table-bordered table-condensed">
                    <thead>
                    <tr>
                        <th class="p-5 pt-0 pb-0 no-padding-top">S/N</th>
                        <th class="p-5 pt-0 pb-0 no-padding-top">Date</th>
                        <th class="p-5 pt-0 pb-0 no-padding-top">Description</th>
                        <th class="p-5 pt-0 pb-0 text-right">Amount</th>
                    </tr>
                    </thead>
                    <tbody class="text-size-mini">
                        @php
                        $investment = $table->investment()->get();
                        $totalInvest = 0;
                        @endphp
                        @foreach($investment as $row)
                        <tr>
                            <td class="p-5 pt-0 pb-0 ">{{$row->investmentID}}</td>
                            <td class="p-5 pt-0 pb-0 ">{{pub_date($row->created_at)}}</td>
                            <td class="p-5 pt-0 pb-0 ">{{$row->description}}</td>
                            <td class="p-5 pt-0 pb-0  text-right">{{money($row->amount)}}</td>
                        </tr>
                        @php
                            $totalInvest += $row->amount;
                        @endphp
                        @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th class="p-5 pt-0 pb-0 text-right" colspan="3">Total</th>
                        <th class="p-5 pt-0 pb-0 text-right">{{money($totalInvest)}}</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <!-- end investment report for complate project -->

        <!-- start expanse report for complate project -->
        <div class="row mt-15">
            <div class="col-xs-12"><h5 class="text-center no-margin">Expanse Report</h5></div>
        </div>
        <div class="row">
            <div class="col-xs-12"><hr class="mt-10 mb-10" /></div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <table class="table table-bordered table-condensed">
                    <thead>
                    <tr>
                        <th class="p-5 pt-0 pb-0 no-padding-top">S/N</th>
                        <th class="p-5 pt-0 pb-0 no-padding-top">Date</th>
                        <th class="p-5 pt-0 pb-0 no-padding-top">Expanse Category</th>
                        <th class="p-5 pt-0 pb-0 no-padding-top">Description</th>
                        <th class="p-5 pt-0 pb-0 text-right">Amount</th>
                    </tr>
                    </thead>
                    <tbody class="text-size-mini">
                    @php
                        $expanse = $table->expanse()->get();
                        $totalExpanse = 0;
                    @endphp
                    @foreach($expanse as $row)
                        <tr>
                            <td class="p-5 pt-0 pb-0 ">{{$row->inexpTransactionID}}</td>
                            <td class="p-5 pt-0 pb-0 ">{{pub_date($row->created_at)}}</td>
                            <td class="p-5 pt-0 pb-0 ">{{$row->inexcat['name']}}</td>
                            <td class="p-5 pt-0 pb-0 ">{{$row->descriptions}}</td>
                            <td class="p-5 pt-0 pb-0  text-right">{{money($row->amountOut)}}</td>
                        </tr>
                        @php
                            $totalExpanse += $row->amountOut;
                        @endphp
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th class="p-5 pt-0 pb-0 text-right" colspan="4">Total</th>
                        <th class="p-5 pt-0 pb-0 text-right">{{money($totalExpanse)}}</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <!-- end expanse report for complate project -->

        <!-- start Sale report for complate project -->
        <div class="row mt-15">
            <div class="col-xs-12"><h5 class="text-center no-margin">Sale Report</h5></div>
        </div>
        <div class="row">
            <div class="col-xs-12"><hr class="mt-10 mb-10" /></div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <table class="table table-bordered table-condensed">
                    <thead>
                    <tr>
                        <th class="p-5 pt-0 pb-0 no-padding-top">S/N</th>
                        <th class="p-5 pt-0 pb-0 no-padding-top">Date</th>
                        <th class="p-5 pt-0 pb-0 no-padding-top">Description</th>
                        <th class="p-5 pt-0 pb-0 text-right">Amount</th>
                    </tr>
                    </thead>
                    <tbody class="text-size-mini">
                    @php
                        $sell = $table->sell()->get();
                        $totalSell = 0;
                    @endphp
                    @foreach($sell as $row)
                        <tr>
                            <td class="p-5 pt-0 pb-0 ">{{$row->projectSellID}}</td>
                            <td class="p-5 pt-0 pb-0 ">{{pub_date($row->created_at)}}</td>
                            <td class="p-5 pt-0 pb-0 ">{{$row->descriptions}}</td>
                            <td class="p-5 pt-0 pb-0  text-right">{{money($row->amount)}}</td>
                        </tr>
                        @php
                            $totalSell += $row->amount;
                        @endphp
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th class="p-5 pt-0 pb-0 text-right" colspan="3">Total</th>
                        <th class="p-5 pt-0 pb-0 text-right">{{money($totalSell)}}</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <!-- end Sale report for complate project -->

        <!-- start profit & lose report for complate project -->
        <div class="row mt-15">
            <div class="col-xs-12"><h5 class="text-center no-margin">Profit & Loss Reports</h5></div>
        </div>
        <div class="row">
            <div class="col-xs-12"><hr class="mt-10 mb-10" /></div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <table class="table table-bordered table-condensed">
                    <thead>
                        <tr>
                            <th class="p-5 pt-0 pb-0 no-padding-top">Income</th>
                            <th class="p-5 pt-0 pb-0 text-right">Amount</th>
                            <th class="p-5 pt-0 pb-0"></th>
                            <th class="p-5 pt-0 pb-0 ">Expanse</th>
                            <th class="p-5 pt-0 pb-0 text-right">Amount</th>
                        </tr>
                    </thead>
                    <tbody class="text-size-mini">
                        <tr>
                            <td class="p-5 pt-0 pb-0">Total Sale</td>
                            <td class="p-5 pt-0 pb-0 text-right">{{money($totalSell)}}</td>
                            <td class="p-5 pt-0 pb-0"></td>
                            <td class="p-5 pt-0 pb-0">All Expense</td>
                            <td class="p-5 pt-0 pb-0 text-right">{{money($totalExpanse)}}</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="p-5 pt-0 pb-0">Total Income</th>
                            <th class="p-5 pt-0 pb-0 text-right">{{money($totalSell)}}</th>
                            <th class="p-5 pt-0 pb-0"></th>
                            <th class="p-5 pt-0 pb-0">Total Expanse</th>
                            <th class="p-5 pt-0 pb-0 text-right">{{money($totalExpanse)}}</th>
                        </tr>
                        <tr>

                            <th colspan="2" class="p-5 pt-0 pb-0 text-center text-indigo text-size-large">Total Profit: {{money($totalInvest + $totalSell - $totalExpanse)}}</th>
                            <th class="p-5 pt-0 pb-0"></th>
                            <th colspan="2" class="p-5 pt-0 pb-0 text-center text-danger text-size-large">Net Profit: {{money($totalSell - $totalExpanse)}}</th>
                        </tr>

                    </tfoot>
                </table>
            </div>
        </div>
        <!-- end profit & lose report for complate project -->

    </div>



@endsection
