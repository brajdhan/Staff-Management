@extends('layouts.app')

@section('title', 'Add New User |')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard / Users /</span> Add New</h4>


    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl_ col-xl-8">

            @if (session()->has('message'))
            <div class="alert alert-{{session()->has('status') ? session()->get('status') : 'info'}} alert-dismissible" role="alert">
                {{session()->get('message')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <div class="card mb-4">
                <div class="card-header d-flex align-items-center border-bottom justify-content-between">
                    <h5 class="mb-0">User Details</h5>
                    {{-- <small class="text-muted float-end">Default label</small> --}}
                </div>
                <div class="card-body pt-3">

                    {!! Form::open(array( 'route' => 'users.store','method'=>'POST')) !!}

                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label" for="basic-default-name">First Name <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            {!! Form::text('first_name', null, array('placeholder' => 'Enter first name','class' => 'form-control')) !!}

                            @if ($errors->has('first_name'))
                            <div class="invalid-feedback d-block">{{$errors->first('first_name')}}</div>
                            @endif
                        </div>
                    </div>


                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label" for="basic-default-name">Last Name <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            {!! Form::text('last_name', null, array('placeholder' => 'Enter last name','class' => 'form-control')) !!}

                            @if ($errors->has('last_name'))
                            <div class="invalid-feedback d-block">{{$errors->first('last_name')}}</div>
                            @endif
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label" for="basic-default-name">Designation</label>
                        <div class="col-sm-9">
                            {!! Form::text('designation', null, array('placeholder' => 'Enter designation','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label" for="basic-default-email">Email <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                {!! Form::email('email', null, array('placeholder' => 'Enter email','class' => 'form-control')) !!}

                                @if ($errors->has('email'))
                                <div class="invalid-feedback d-block">{{$errors->first('email')}}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label" for="basic-default-email">Password <span class="text-danger">*</span></label>
                        <div class="col-sm-9">

                            {!! Form::password('password', array('placeholder' => 'Enter password','class' => 'form-control')) !!}

                            @if ($errors->has('password'))
                            <div class="invalid-feedback d-block">{{$errors->first('password')}}</div>
                            @endif
                            <div class="form-text">You can use letters, numbers & periods</div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label" for="basic-default-phone">Phone No <span class="text-danger">*</span></label>
                        <div class="col-sm-9">

                            {!! Form::tel('phone', null, array('placeholder' => 'Enter phone number','class' => 'form-control')) !!}

                            @if ($errors->has('phone'))
                            <div class="invalid-feedback d-block">{{$errors->first('phone')}}</div>
                            @endif
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label" for="basic-default-message">Gender <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            {!! Form::select('gender', __genders(), null, array('class' => 'form-control')) !!}
                            @if ($errors->has('gender'))
                            <div class="invalid-feedback d-block">{{$errors->first('gender')}}</div>
                            @endif
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label" for="basic-default-message">Role <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            {!! Form::select('role', $roles, null, array('class' => 'form-control')) !!}
                            @if ($errors->has('role'))
                            <div class="invalid-feedback d-block">{{$errors->first('role')}}</div>
                            @endif
                        </div>
                    </div>


                    <div class="addresses-container">
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label" for="basic-default-address">Address</label>
                            <div class="col-sm-7">
                                <textarea name="address[]" placeholder="Enter address" class="form-control" cols="3" rows="3">{{old('address')[0] ?? ''}}</textarea>
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-success">Add Address</button>
                            </div>
                        </div>
                    </div>

                    @if(old('address') != null)
                        @php $address_old = old('address'); unset($address_old[0]); @endphp
                        @foreach($address_old as $ad)
                        <div class="row mb-3">
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="basic-default-address">Address</label>
                                <div class="col-sm-7">
                                    <textarea name="address[]" placeholder="Enter address" class="form-control" cols="3" rows="3">{{$ad}}</textarea>
                                </div>
                                <div class="col-sm-2">
                                <button class="btn btn-danger remove-address">Remove</button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endif


                    <div class="row justify-content-end">
                        <div class="col-sm-9 text-end">
                            <button type="submit" class="btn btn-primary">Add User</button>
                        </div>
                    </div>
                    @if ($errors->has('unknown'))
                    <div class="invalid-feedback d-block">{{$errors->first('unknown')}}</div>
                    @endif

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

</div>

@endsection


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
        // Append new address field
        $('.btn-success').click(function(){
            var i=0;
            
            var html = '<div class="row mb-3">' +
                '<label class="col-sm-3 col-form-label" for="basic-default-address">Address '+i+1+'</label>' +
                '<div class="col-sm-7">' +
                '<textarea name="address[]" placeholder="Enter address" class="form-control" cols="3" rows="3"></textarea>' +
                '</div>' +
                '<div class="col-sm-2">' +
                '<button class="btn btn-danger remove-address">Remove</button>' +
                '</div>' +
                '</div>';
            $('.addresses-container').append(html);
            
        });

        // Remove address field
        $(document).on('click', '.remove-address', function(){
            $(this).closest('.row').remove();
        });


    
        $('#myForm').submit(function(e){
            e.preventDefault(); // Prevent default form submission

            // Serialize form data
            var formData = $(this).serialize();

            // Send AJAX request
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: formData,
                success: function(response){
                    // Handle successful response
                    console.log(response);
                },
                error: function(xhr, status, error){
                    // Handle errors
                    console.error(error);
                }
            });
        });
    });
</script>