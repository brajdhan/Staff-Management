@extends('layouts.app')

@section('title', 'Users List |')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Users</h4>

    @if (session()->has('message'))
    <div class="alert alert-{{ session()->has('status') ? session()->get('status') : 'info' }} alert-dismissible" role="alert">
        {{ session()->get('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <!-- Basic Bootstrap Table -->
    <div class="card">
        <h5 class="card-header">User and Staff List</h5>
        <div class="table-responsive text-nowrap">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Gender</th>
                        <th>Current Address</th>
                        <th>Permanent Address</th>
                        <th>Role</th>
                        <th>Profile</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    {{-- @isset($users) --}}
                    @forelse ($users as $item)
                    <tr>
                        <td>
                            <strong class="d-block">{{ $item->first_name }} {{ $item->last_name }}</strong>
                            <small class="text-muted d-block">{{ $item->designation }}</small>
                        </td>

                        <td>{{ $item->email }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ ucFirst($item->gender) }}</td>
                        <td>{{ $item->current_address }}</td>
                        <td>{{ $item->permanent_address }}</td>
                        <td>
                            
                            @if (in_array('admin', $item->getRoleNames()->toArray()))
                            <span class="badge bg-label-warning">Admin</span>
                            @elseif (in_array('user', $item->getRoleNames()->toArray()))
                            <span class="badge bg-label-info">User</span>
                            @elseif (in_array('staff', $item->getRoleNames()->toArray()))
                            <span class="badge bg-label-danger">Staff</span>
                            @endif
                            
                        </td>
                        <td><img src="{{ asset('uploads') }}/{{$item->profile}}" width="80px" alt="No Image"></td>
                        <td>
                            @if(auth()->user()->can('Edit User') || auth()->user()->can('Delete User'))
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    @can('Edit User')
                                    <a class="dropdown-item" href="{{ route('users.edit', $item->id) }}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                    @endcan
                                    @can('Delete User')
                                    {!! Form::open(['route' => ['users.destroy', $item->id], 'method' => 'POST']) !!}

                                    {{ method_field('DELETE') }}

                                    <button class="dropdown-item" type="submit"><i class="bx bx-trash me-1"></i>Delete</a></button>

                                    {!! Form::close() !!}
                                    @endcan
                                </div>
                            </div>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">No records found!</td>
                    </tr>
                    @endforelse
                    {{-- @endisset --}}
                </tbody>
            </table>
        </div>
    </div>
    <!--/ Basic Bootstrap Table -->

</div>

@endsection