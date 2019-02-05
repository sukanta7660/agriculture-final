@extends('layouts.master')
@extends('box.users.user')
@section('title')
    Users
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6">
            <p><button type="button" class="btn btn-primary btn-labeled" data-toggle="modal" data-target="#myModal"><b><i class="icon-file-plus"></i></b> Add New Users</button></p>
        </div>
        <div class="col-md-6"></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-flat border-top-success">
                <div class="panel-heading">
                    <h6 class="panel-title">All Users</h6>
                </div>

                <div class="panel-body">
                    <table class="table table-bordered table-condensed table-hover table-striped datatable">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Cell</th>
                            <!--<th>NID</th>-->
                            <th>Add.</th>
                            <th>Dist.</th>
                            <th>P.Code</th>
                            <th>Type</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($table as $row)
                            <tr>
                                <td>{{$row->name}}</td>
                                <td>{{$row->email}}</td>
                                <td>{{$row->contact}}</td>
                                <td>{{$row->address}}</td>
                                <td>{{$row->district}}</td>
                                <td>{{$row->postcode}}</td>
                                <td>{{$row->userRoll}}</td>
                                <td class="text-right">
                                    <button class="btn btn-xs btn-success no-padding mr-5 ediBtn" data-name="{{$row->name}}" data-user_roll="{{$row->userRoll}}" data-id="{{$row->id}}" data-contact="{{$row->contact}}" data-email="{{$row->email}}" data-address="{{$row->address}}" data-nid="{{$row->nid}}"  data-postcode="{{$row->postcode}}" data-district="{{$row->district}}" data-toggle="modal" data-target="#ediModal" title="Edit"><i class="icon-pencil5"></i></button>
                                    <a class="btn btn-xs btn-danger no-padding" href="{{action('User\UserController@del', ['id' => $row->id])}}"  onclick="return confirm('Are you sure to delete?')" title="Delete"><i class="icon-bin"></i></a>
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

        $(function () {
            $('.ediBtn').click(function () {
                var id = $(this).data('id');
                var name = $(this).data('name');
                var email = $(this).data('email');
                var contact = $(this).data('contact');
                var address = $(this).data('address');
                var district = $(this).data('district');
                var postcode = $(this).data('postcode');
                var user_roll = $(this).data('user_roll');
                var nid = $(this).data('nid');



                $('#ediID').val(id);
                $('#ediModal [name=name]').val(name);
                $('#ediModal [name=email]').val(email);
                $('#ediModal [name=nid]').val(nid);
                $('#ediModal [name=contact]').val(contact);
                $('#ediModal [name=address]').val(address);
                $('#ediModal [name=postcode]').val(postcode);
                $('#ediModal [name=userRoll]').val(user_roll);
                $('#ediModal [name=district]').val(district);

            });
        });

        /*$('#phone_no').intlTelInput({
            initialCountry: "auto",
            geoIpLookup: function(callback){
                $.get('http://ipinfo.io', function(){}, "jsonp").always(function(resp){
                    var countryCode = (resp && resp.country) ? resp.country : "";
                    callback(countryCode);
                });
            },
            utilsScript: "js/utils.js"
        });*/

        $(document).ready(function() {
            $('#user_form')
                .find('[name="contact"]')
                .intlTelInput({
                    utilsScript: '{{asset('public/assets/dial_code_flag/js/utils.js')}}',
                    autoPlaceholder: true,
                    preferredCountries: ['fr', 'us', 'gb']
                });

            $('#user_form')
                .formValidation({
                    framework: 'bootstrap',
                    icon: {
                        valid: 'glyphicon glyphicon-ok',
                        invalid: 'glyphicon glyphicon-remove',
                        validating: 'glyphicon glyphicon-refresh'
                    },
                    fields: {
                        contact: {
                            validators: {
                                callback: {
                                    message: 'The phone number is not valid',
                                    callback: function(value, validator, $field) {
                                        return value === '' || $field.intlTelInput('isValidNumber');
                                    }
                                }
                            }
                        }
                    }
                })
                // Revalidate the number when changing the country
                .on('click', '.country-list', function() {
                    $('#user_form').formValidation('revalidateField', 'contact');
                });
        });


    </script>

@endsection