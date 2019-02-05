@section('box')
    <!-- Basic modal -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title"><i class="icon-file-plus"></i> Add New User</h5>
                </div>

                <form action="{{action('User\UserController@save')}}"  id="user_form" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-lg-3 control-label">User Name:</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="name" placeholder="User Name" type="text" required>
                            </div>
                        </div><br>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Email:</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="email" placeholder="Email" type="email" required>
                            </div>
                        </div><br>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">User Roll:</label>
                            <div class="col-lg-9">
                                <select class="form-control m-input" name="userRoll">
                                        <option value="">Select a Roll</option>
                                    <option value="Owner">Owner</option>
                                    <option value="Employee">Employee</option>
                                </select>
                            </div>
                        </div><br>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Password:</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="password" placeholder="Password.." type="password" required>
                            </div>
                        </div><br>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Re-Password:</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="password" placeholder="Re-Password.." type="password" required>
                            </div>
                        </div><br>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Contact No:</label>
                            <div class="col-lg-9">
                                <input class="form-control"  name="contact" type="tel">
                            </div>
                        </div><br>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">NID No:</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="nid" placeholder="NID No" type="text" required>
                            </div>
                        </div><br>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Address:</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="address" placeholder="Address" type="text" required>
                            </div>
                        </div><br>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">District:</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="district" placeholder="District.." type="text" required>
                            </div>
                        </div><br>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Postcode:</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="postcode" placeholder="Postcode.." type="text" required>
                            </div>
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
    <!-- /basic modal -->

    <!-- Basic Edi modal -->
    <div id="ediModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title"><i class="icon-pencil7"></i> Edit User</h5>
                </div>

                <form action="{{action('User\UserController@edit')}}" id="user_form" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" id="ediID" name="id">

                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-lg-3 control-label">User Name:</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="name" placeholder="User Name" type="text" required>
                            </div>
                        </div><br>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Email:</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="email" placeholder="Email" type="email" required>
                            </div>
                        </div><br>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">User Type:</label>
                            <div class="col-lg-9">
                                <select class="form-control m-input" name="userRoll">
                                    <option value="">Select a Roll</option>
                                    <option value="Owner">Owner</option>
                                    <option value="Employee">Employee</option>
                                </select>
                            </div>
                        </div><br>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Contact No:</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="contact" placeholder="Contact No.." type="text" required>
                            </div>
                        </div><br>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">NID No:</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="nid" placeholder="NID No" type="text" required>
                            </div>
                        </div><br>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Address:</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="address" placeholder="Address" type="text" required>
                            </div>
                        </div><br>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">District:</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="district" placeholder="District.." type="text" required>
                            </div>
                        </div><br>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Postcode:</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="postcode" placeholder="Postcode.." type="text" required>
                            </div>
                        </div><br>
                    </div><br>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-cancel-circle2"></i> Close</button>
                        <button type="submit" class="btn btn-primary"><i class="icon-checkmark4"></i> Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /basic Edi modal -->
@endsection