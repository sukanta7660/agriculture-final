@section('box')
    <!-- deposit modal -->
    <div id="depositModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title"><i class="icon-file-plus"></i> Deposit Amount to Bank</h5>
                </div>

                <form action="{{action('Bank\BankTransacController@deposit')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <div class="input-group">
                            <span class="input-group-addon">Bank A/C </span>
                            <select class="form-control m-input" name="bankID" >
                                    <option value="">Select an Account</option>
                            @foreach($bankinfo as $row)
                                    <option value="{{$row->bankID}}">{{$row->name}}&nbsp;[ {{$row->accountNo}} ]</option>
                                @endforeach
                            </select>
                        </div><br>
                        <div class="input-group">
                            <span class="input-group-addon">Deposit Amount: </span>
                            <input class="form-control" name="amountIN" placeholder="Deposit Amount" type="number" min="0" required>
                        </div><br>
                        <div class="form-group">
                            <label>Deposit Description <span class="text-sm text-muted">Deposit Slip Number or any thing</span></label>
                            <textarea class="form-control" name="descriptions" rows="3" placeholder="Deposit Slip Number or writing any thing ..."></textarea>
                        </div><br>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-cancel-circle2"></i> Close</button>
                        <button type="submit" id="submit-all" class="btn btn-primary"><i class="icon-checkmark4"></i> Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- deposit modal -->

    <!-- Withdraw modal -->
    <div id="withdrawModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title"><i class="icon-file-plus"></i> Withdraw Amount From Bank</h5>
                </div>

                <form action="{{action('Bank\BankTransacController@withdraw')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <div class="input-group">
                            <span class="input-group-addon">Bank A/C </span>
                            <select class="form-control m-input" name="bankID" >
                                    <option value="">Select an Account</option>
                            @foreach($bankinfo as $row)
                                    <option value="{{$row->bankID}}">{{$row->name}}&nbsp;[ {{$row->accountNo}} ]</option>
                                @endforeach
                            </select>
                        </div><br>
                        <div class="input-group">
                            <span class="input-group-addon">Withdraw Amount: </span>
                            <input class="form-control" name="amountOut" placeholder="Withdraw Amount" type="number" min="0" required>
                        </div><br>

                        <div class="form-group">
                            <label>Withdraw Description <span class="text-sm text-muted">Cheque Number or any thing</span></label>
                            <textarea class="form-control" name="descriptions" rows="3" placeholder="Cheque Number or any thing ..."></textarea>
                        </div><br>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-cancel-circle2"></i> Close</button>
                        <button type="submit" id="submit-all" class="btn btn-primary"><i class="icon-checkmark4"></i> Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Withdraw modal -->
@endsection