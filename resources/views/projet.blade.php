@extends('layouts.project')
@section('title')
    Dashboard22
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-flat border-top-success">
                <div class="panel-heading">
                    <h6 class="panel-title">Top custom222 border</h6>
                </div>

                <div class="panel-body">
                    <h4 class="m-0">{{session('projectName')}}</h4>
                </div>
            </div>
        </div>
    </div>
@endsection