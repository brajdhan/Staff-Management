@extends('layouts.app')

@section('title', 'Roles |')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Roles</h4>

        @if (session()->has('message'))
            <div class="alert alert-{{ session()->has('status') ? session()->get('status') : 'info' }} alert-dismissible"
                role="alert">
                {{ session()->get('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">Role's List</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Role Name</th>
                            <th>Permissions</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse ($roles as $role)
                            <tr>
                                <td>
                                    <strong class="d-block">{{ ucfirst($role->name) }}</strong>
                                </td>
                                <td>
                                    <div style="display: flex; flex-wrap: wrap;">
                                        @foreach ($role->permissions as $key => $permission)
                                            <span class="permissions">{{ $permission->name }}</span>
                                            @if (($key + 1) % 5 === 0)
                                                <br>
                                            @endif
                                        @endforeach
                                    </div>
                                </td>
                                <td>
                                    <a class="dropdown-item" href="{{ route('roles.edit', $role->id) }}"><i
                                            class="bx bx-edit-alt me-1"></i> Edit</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No records found!</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->

    </div>

@endsection
