@extends('layouts.master')
@section('title')
    Dashboard
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-flat border-top-success">
                <div class="panel-heading">
                    <h6 class="panel-title">Top custom border</h6>
                </div>

                <div class="panel-body">

                    <div class="chart-container">
                        <div class="chart has-fixed-height" id="basic_columns"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

    <script type="text/javascript" src="{{asset('public/assets/js/plugins/visualization/echarts/echarts.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/assets/js/charts/echarts/columns_waterfalls.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/assets/js/charts/echarts/timeline_option.js')}}"></script>

    <script type="text/javascript">

        $(function () {

        });




    </script>

@endsection