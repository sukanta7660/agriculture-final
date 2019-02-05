@extends('layouts.project')

@section('title')
    Invest Reports
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-flat border-top-success">
                <div class="panel-heading">
                    <h6 class="panel-title">Invest Reports</h6>
                </div>
                <form action="{{action('Reports\ProjectWise\InvestReportController@show')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="panel-body">

                        <div class="input-group">
                            <span class="input-group-addon">Select Date Range</span>
                            <input class="form-control date_rang_pick" name="dateRang" placeholder="Pick Date" type="text">
                        </div>


                    </div>
                    <div class="panel-footer">
                        <div class="heading-elements">
                            <div class="heading-btn pull-right">
                                <!--<button type="reset" class="btn btn-default"><i class="icon-reset"></i> Reset</button>-->
                                <button type="submit" class="btn btn-info"><i class="icon-stats-bars2"></i> Next</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection


@section('script')
    <script type="text/javascript" src="{{asset('public/assets/js/plugins/ui/moment/moment.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/assets/js/plugins/pickers/daterangepicker.js')}}"></script>


    <script type="text/javascript">

        $(function () {
            $('.select2').select2();
        });

        $(function () {
            $('.date_rang_pick').daterangepicker({
                opens:'right',
                locale: {
                    format: 'DD/MM/YYYY'
                }
            });
        });

        $(function () {
            $('.date_pick').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                locale: {
                    format: 'DD/MM/YYYY'
                }
            });
        });


    </script>

@endsection
