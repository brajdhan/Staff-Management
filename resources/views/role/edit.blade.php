@extends('layouts.app')

@section('title', 'Edit Roles |')

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard / Roles / </span> Edit</h4>

        <div class="row">
            <!-- Basic Layout -->
            <div class="col-xxl_ col-xl-8">

                @if (session()->has('message'))
                    <div class="alert alert-{{ session()->has('status') ? session()->get('status') : 'info' }} alert-dismissible"
                        role="alert">
                        {{ session()->get('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center border-bottom justify-content-between">
                        <h5 class="mb-0">Role Details</h5>
                    </div>
                    <div class="card-body pt-3">

                        {!! Form::model($role, ['route' => ['roles.update', $role->id], 'method' => 'POST']) !!}

                        {{ method_field('PATCH') }}

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label" for="basic-default-message">Role </label>
                            <div class="col-sm-9">

                                {{ Form::text('name', $value = ucfirst($role->name), ['class' => 'form-control', 'disabled' => 'disabled']) }}

                                @if ($errors->has('role'))
                                    <div class="invalid-feedback d-block">{{ $errors->first('role') }}</div>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label" for="basic-default-name">Permissions </label>
                            <div class="col-sm-9">

                                @php
                                    $selectedOption = $role->permissions ? $role->permissions : null;
                                @endphp

                                @foreach ($permissions as $permission)
                                    <div class="form-check form-check-inline mt-3">
                                        {{ Form::checkbox("permission[{$permission->id}]", $permission->id, in_array($permission->id, $selectedOption->pluck('id')->toArray()), ['id' => "permission_{$permission->id}", 'class' => "form-check-input {$permission->id}"]) }}
                                        {{ Form::label("permission_{$permission->id}", $permission->name) }}
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-9 text-end">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                        @if ($errors->has('unknown'))
                            <div class="invalid-feedback d-block">{{ $errors->first('unknown') }}</div>
                        @endif

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
