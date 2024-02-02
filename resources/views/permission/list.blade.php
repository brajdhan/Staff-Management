@extends('layouts.app')

@section('title', 'Permissions |')

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Permissions</h4>

        @if (session()->has('message'))
            <div class="alert alert-{{ session()->has('status') ? session()->get('status') : 'info' }} alert-dismissible"
                role="alert">
                {{ session()->get('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="mb-3">
            <a href="{{ route('permissions.create') }}" class="btn btn-success mb-1 fw-bold">
                <span class="tf-icons bx bx-circle-plus"></span>
                Create Permission
            </a>
        </div>
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">Permission's List</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Permission Name </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse ($permissions as $permission)
                            <tr>
                                <td>
                                    <strong class="d-block">{{ $permission->name }}</strong>
                                </td>
                                <td class="py-4 px-6 border-b border-grey-light">
                                    @foreach ($permission->permissions as $permission)
                                        <span
                                            class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-white bg-gray-500 rounded-full">{{ $permission->name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    <a class="dropdown-item" href="{{ route('permissions.edit', $permission->id) }}"><i
                                            class="bx bx-edit-alt me-1"></i> Edit</a>

                                    {!! Form::open(['route' => ['permissions.destroy', $permission->id], 'method' => 'POST']) !!}

                                    {{ method_field('DELETE') }}

                                    <button class="dropdown-item" type="submit"><i class="bx bx-trash me-1"></i>
                                        Delete</a></button>

                                    {!! Form::close() !!}
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
    <div class="container-xxl flex-grow-1">
        {{ $permissions->links() }}
    </div>

@endsection
