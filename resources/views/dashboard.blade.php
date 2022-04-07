@extends('layout')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
  
                <div class="card-body">
                    <a href="{{ route('customer.show') }}"><button type="button" class="btn btn-primary">Customers</button></a>
                    <a href="{{ route('complaint.show') }}"><button type="button" class="btn btn-primary">Complaints</button></a>
                    <a href="{{ route('suggestion.show') }}"><button type="button" class="btn btn-primary">Suggestions</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection