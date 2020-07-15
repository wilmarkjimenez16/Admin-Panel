@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-left btn"><font class="btn btn-danger" data-toggle="modal" data-target="#deleteCompanyModal">Delete</font></div>
                <div class="float-right"><a class="btn btn-primary" href="/companies/">{{ __('Back') }}</a></div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-8">
                                <div class="form-control">{{ $company->name }}</div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-8">
                                <div class="form-control">{{ $company->email }}</div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="logo" class="col-md-2 col-form-label text-md-right">{{ __('Logo') }}</label>

                            <div class="col-md-8">
                                <img src="{{ asset('storage/'. $company->logo )}}" width="100" height="100" alt="logo">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="website" class="col-md-2 col-form-label text-md-right">{{ __('Website') }}</label>

                            <div class="col-md-8">
                                <div class="form-control">{{ $company->website }}</div>
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-2">
                                <a href="/companies/{{ $company->id }}/edit" class="btn btn-primary">
                                    {{ __('Edit') }}
                                </a>
                            </div>
                        </div>
                </div>
            </div>

        <!-- Modal -->
        <div class="modal fade" id="deleteCompanyModal" tabindex="-1" role="dialog" aria-labelledby="deleteCompanyModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <form action="/companies/{{ $company->id }}" method="POST">
                @csrf
                @method('delete')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteCompanyModalLabel">Delete Investment</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Do you want to delete Company Name <strong>{{ $company->name }}</strong> permanently?
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