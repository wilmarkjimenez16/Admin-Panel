@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-left btn"><font class="btn btn-danger" data-toggle="modal" data-target="#deleteEmployeeModal">Delete</font></div>
                <div class="float-right"><a class="btn btn-primary" href="/employees/">{{ __('Back') }}</a></div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <div class="form-group row">
                            <label for="first_name" class="col-md-2 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-8">
                                <div class="form-control">{{ $employee->first_name }}</div>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="last_name" class="col-md-2 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-8">
                                <div class="form-control">{{ $employee->last_name }}</div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="company" class="col-md-2 col-form-label text-md-right">{{ __('Company') }}</label>

                            <div class="col-md-8">
                                <div class="form-control">{{ $employee->company->name ?? "" }}</div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-8">
                                <div class="form-control">{{ $employee->email }}</div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-2 col-form-label text-md-right">{{ __('Phone') }}</label>

                            <div class="col-md-8">
                                <div class="form-control">{{ $employee->phone }}</div>
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-2">
                                <a href="/employees/{{ $employee->id }}/edit" class="btn btn-primary">
                                    {{ __('Edit') }}
                                </a>
                            </div>
                        </div>
                </div>
            </div>

        <!-- Modal -->
        <div class="modal fade" id="deleteEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="deleteEmployeeModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <form action="/employees/{{ $employee->id }}" method="POST">
                @csrf
                @method('delete')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteEmployeeModalLabel">Delete Investment</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Do you want to delete Employee Name <strong>{{ $employee->first_name . ' ' . $employee->last_name }}</strong> permanently?
                        <div class="row justify-content-md-center"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Confirm</button>
                    </div>
                </div>
            </form>
            </div>
        </div>

        </div>
    </div>
</div>
@endsection