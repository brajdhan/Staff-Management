@extends('layouts.app')

@section('title', 'Add Edit User |')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard / Users /</span> Edit</h4>


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
                
                {!! Form::model($user, array('route' => ['users.update', $user->id],'method'=>'POST', 'enctype'=>"multipart/form-data")) !!}

                {{ method_field('PATCH') }}

                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label" for="basic-default-first-name">First Name <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            {!! Form::text('first_name', null, array('placeholder' => 'Enter first name','class' => 'form-control')) !!}

                            @if ($errors->has('first_name'))
                                <div class="invalid-feedback d-block">{{$errors->first('first_name')}}</div>
                            @endif
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label" for="basic-default-last-name">Last Name <span class="text-danger">*</span></label>
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
                        <label class="col-sm-3 col-form-label" for="basic-default-email">Password</label>
                        <div class="col-sm-9">

                            {!! Form::password('password', array('placeholder' => 'Enter password if you want to update','class' => 'form-control')) !!}

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
                        <label class="col-sm-3 col-form-label" for="basic-default-message">Role <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            {!! Form::select('gender', __genders(), $user->gender, array('class' => 'form-control')) !!}
                            @if ($errors->has('gender'))
                                <div class="invalid-feedback d-block">{{$errors->first('gender')}}</div>
                            @endif
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label" for="basic-default-message">Role <span class="text-danger">*</span></label>
                        <div class="col-sm-9">

                            @php
                                $userRoles = $user->getRoleNames()->toArray();
                                $role = $userRoles[0];
                            @endphp

                            {!! Form::select('role', $roles, $role, array('class' => 'form-control')) !!}
                            @if ($errors->has('role'))
                                <div class="invalid-feedback d-block">{{$errors->first('role')}}</div>
                            @endif
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label" for="basic-default-current-address">Current Address</label>
                        <div class="col-sm-9">

                        {!! Form::textarea('current_address', null, array('placeholder' => 'Enter current address','class' => 'form-control', 'cols' =>3, 'rows' =>3)) !!}

                        @if ($errors->has('current_address'))
                            <div class="invalid-feedback d-block">{{$errors->first('current_address')}}</div>
                        @endif
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label" for="basic-default-permanent-address">Permanent Address</label>
                        <div class="col-sm-9">

                        {!! Form::textarea('permanent_address', null, array('placeholder' => 'Enter permanent address','class' => 'form-control', 'cols' =>3, 'rows' =>3)) !!}

                        @if ($errors->has('permanent_address'))
                            <div class="invalid-feedback d-block">{{$errors->first('permanent_address')}}</div>
                        @endif
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label" for="basic-default-file">Profile <span class="text-danger">*</span></label>
                        
                        <div class="col-sm-4">
                       
                        {!! Form::file('profile', null, array('class' => 'form-control')) !!}

                        @if ($errors->has('profile'))
                            <div class="invalid-feedback d-block">{{$errors->first('profile')}}</div>
                        @endif
                        </div>
                        <div class="col-sm-5">
                        <span class="app-brand-logo demo">
                        <img src="{{ asset('uploads') }}/{{$user->profile}}" width="150px" alt="No Image">
                        </span> 
                        </div>
                    </div>

                    <div class="row justify-content-end">
                        <div class="col-sm-9 text-end">
                            <button type="submit" class="btn btn-primary">Update User</button>
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