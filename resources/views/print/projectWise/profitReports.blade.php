@extends('layouts.print')

@section('title')
    Profit & Lose Reports
@endsection

@section('content')

    <!-- invoice template -->

    <div class="bg-white border-radius p-5">
        <div class="row hidden-print">
            <div class="col-xs-6 mt-10"><h6 class="m-5"><i class="icon-printer"></i> Profit & Lose Reports</h6></div>
            <div class="col-xs-6 mt-10 text-right">
                <button type="button" class="btn btn-danger btn-xs heading-btn" onclick="history.go(-1)"><i class="icon-arrow-left16 position-left"></i> Go Back</button>
                <button type="button" class="btn btn-success btn-xs heading-btn" onclick="window.print()"><i class="icon-printer position-left"></i> Print</button>
            </div>
            <div class="col-xs-12"><hr class="mt-10 mb-10" /></div>
        </div>


        <div class="row">
            <div class="col-xs-12"><h5 class="text-center no-margin">Profit or Lose Reports for <strong class="text-uppercase">{{session('projectName')}} </strong></h5></div>
        </div>
        <div class="row">
            <div class="col-xs-6"><b class="no-margin">Month: </b>{{$months}}</div>
            <div class="col-xs-6 text-right"><b class="no-margin">Report Date: </b>{{date("d/m/Y") }}</div>
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
                            <td class="p-5 pt-0 pb-0 text-right">{{money($all_income)}}</td>
                            <td class="p-5 pt-0 pb-0"></td>
                            <td class="p-5 pt-0 pb-0">All Expense</td>
                            <td class="p-5 pt-0 pb-0 text-right">{{money($all_expanse)}}</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="p-5 pt-0 pb-0">Total Income</th>
                            <th class="p-5 pt-0 pb-0 text-right">{{money($all_income)}}</th>
                            <th class="p-5 pt-0 pb-0"></th>
                            <th class="p-5 pt-0 pb-0">Total Expanse</th>
                            <th class="p-5 pt-0 pb-0 text-right">{{money($all_expanse)}}</th>
                        </tr>
                        <tr>
                            <th colspan="5" class="p-5 pt-0 pb-0 text-center text-indigo text-size-large">Total
                                @php
                                if($all_income > $all_expanse){
                                    echo 'Profit: ';
                                }
                                else{
                                    echo 'Loss: ';
                                }
                                @endphp
                                {{money(abs(($all_income)-($all_expanse)))}}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

    </div>



@endsection
