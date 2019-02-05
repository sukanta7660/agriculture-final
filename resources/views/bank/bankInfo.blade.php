@extends('layouts.master')
@extends('box.bank.bankinfo')
@section('title')
    Bank Information
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6">
            <p><button type="button" class="btn btn-primary btn-labeled" data-toggle="modal" data-target="#myModal"><b><i class="icon-file-plus"></i></b> Add New Bank Information</button></p>
        </div>
        <div class="col-md-6"></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-flat border-top-success">
                <div class="panel-heading">
                    <h6 class="panel-title">All Bank Information</h6>
                </div>

                <div class="panel-body">
                    <table class="table table-bordered table-condensed table-hover table-striped datatable">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>A/C No</th>
                            <th>Branch</th>
                            <th>C.Person</th>
                            <th>Contact</th>
                            <th>Balance</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($table as $row)
                            <tr>
                                <td>{{$row->name}}</td>
                                <td>{{ac_type($row->accountNo)}}</td>
                                <td>{{$row->branch}}</td>
                                <td>{{$row->contactPerson}}</td>
                                <td>{{$row->contact}}</td>
                                <td>{{money($row->balance)}}</td>
                                <td class="text-right">
                                    <button class="btn btn-xs btn-success no-padding mr-5 ediBtn" data-name="{{$row->name}}" data-acno="{{$row->accountNo}}" data-branch="{{$row->branch}}" data-cperson="{{$row->contactPerson}}" data-contact="{{$row->contact}}" data-balance="{{$row->balance}}" data-id="{{$row->bankID}}"  data-toggle="modal" data-target="#ediModal" title="Edit"><i class="icon-pencil5"></i></button>
                                    <a class="btn btn-xs btn-danger no-padding" href="{{action('Bank\BankIinfoController@del', ['id' => $row->bankID])}}"  onclick="return confirm('Are you sure to delete?')" title="Delete"><i class="icon-bin"></i></a>
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

    <script type="text/javascript">

        $(function () {

            $('.datatable').DataTable({
                order: [[ 0, "desc" ]],
                columnDefs: [
                    { orderable: false, "targets": [1,3] }//For Column Order
                ]
            });

        });

        $(function () {
            $('.ediBtn').click(function () {
                var id = $(this).data('id');
                var name = $(this).data('name');
                var accountNo = $(this).data('acno');
                var branch = $(this).data('branch');
                var cperson = $(this).data('cperson');
                var contact = $(this).data('contact');
                var balance = $(this).data('balance');


                $('#ediID').val(id);
                $('#ediModal [name=name]').val(name);
                $('#ediModal [name=accountNo]').val(accountNo);
                $('#ediModal [name=branch]').val(branch);
                $('#ediModal [name=contactPerson]').val(cperson);
                $('#ediModal [name=contact]').val(contact);
                $('#ediModal [name=balance]').val(balance);
            });
        });

    </script>

@endsection