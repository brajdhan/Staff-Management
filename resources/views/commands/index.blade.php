@extends('layouts.app')

@section('title', 'Customers |')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Commands</h4>


    @if (session()->has('message'))
      <div class="alert alert-{{session()->has('status') ? session()->get('status') : 'info'}} alert-dismissible" role="alert">
          {{session()->get('message')}}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    
    <!-- Basic Bootstrap Table -->  
    <div class="card">
        <h5 class="card-header">Command List</h5>
        <div class="table-responsive text-nowrap">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Command Name</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
            
                <tr>
                    <td>
                        Run Migration
                    </td>
                    
                    <td>
                        <a href="{{route('runMigration')}}" class="btn btn-success mb-1 fw-bold">
                            Run
                        </a>
                    </td>
                    
                </tr>

                <tr>
                    <td>
                        Run Migration Rollback
                    </td>
                    
                    <td>
                        <a href="{{route('runMigrationRollback')}}" class="btn btn-success mb-1 fw-bold">
                            Run
                        </a>
                    </td>
                    
                </tr>

                <tr>
                    <td>
                        Run Migration Fresh
                    </td>
                    
                    <td>
                        <a href="{{route('runMigrationFresh')}}" class="btn btn-success mb-1 fw-bold">
                            Run
                        </a>
                    </td>
                    
                </tr>

                <tr>
                    <td>
                        Run Optimize Clear
                    </td>
                    
                    <td>
                        <a href="{{route('runOptimizeClear')}}" class="btn btn-success mb-1 fw-bold">
                            Run
                        </a>
                    </td>
                    
                </tr>

                <tr>
                    <td>
                        Run Config Cache
                    </td>
                    
                    <td>
                        <a href="{{route('runConfigCache')}}" class="btn btn-success mb-1 fw-bold">
                            Run
                        </a>
                    </td>
                    
                </tr>

                <tr>
                    <td>
                        Run DB Seed
                    </td>
                    
                    <td>
                        <a href="{{route('runDBSeed')}}" class="btn btn-success mb-1 fw-bold">
                            Run
                        </a>
                    </td>
                    
                </tr>
            </tbody>
          </table>
        </div>
    </div>
    <!--/ Basic Bootstrap Table -->
    
</div>
    
@endsection