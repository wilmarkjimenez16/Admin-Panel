@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div>{{ $employee->links() }}</div>
            <div class="card">
                <div class="card-header">
                    <div class="float-left btn">{{ __('Employees') }}</div>
                    <div class="float-right"><a class="btn btn-primary" href="/employees/create">{{ __('Add') }}</a></div>
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
                                <th>Company</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employee as $key => $item)
                                <tr>
                                    <td><strong>{{ $employee->firstItem() + $key }}.</strong></td>
                                    <td>{{ $item->first_name . ' ' . $item->last_name}}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->company->name ?? "" }}</td>
                                    <td><a class="btn btn-info" href="/employees/{{ $item->id }}">View</a></td>
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