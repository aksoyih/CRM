@extends('layout')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <table class="table">
                <a href="{{ route('customer.new') }}" class="btn btn-success pull-right">New Customer</a>
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Surname</th>
                        <th scope="col">Company</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customers as $customer)
                    <tr>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->surname }}</td>
                        <td>{{ $customer->company }}</td>
                        <td>
                            <a href="{{ route('customer.detail', $customer->id) }}" class="btn btn-primary">Show</a>
                            <a href="{{ route('customer.complaints', $customer->id) }}" class="btn btn-primary">Complaints</a>
                            <a href="{{ route('customer.suggestions', $customer->id) }}" class="btn btn-primary">Suggestions</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection