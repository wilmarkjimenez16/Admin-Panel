@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-8">
            <div>{{ $company->links() }}</div>
            <div class="card">
                <div class="card-header">
                    <div class="float-left btn">{{ __('Companies') }}</div>
                <div class="float-right"><a class="btn btn-primary" href="/companies/create">{{ __('Add') }}</a></div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($company as $key => $item)
                                <tr>
                                    <td><strong>{{ $company->firstItem() + $key }}.</strong></td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td><a class="btn btn-info" href="/companies/{{ $item->id }}">View</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection