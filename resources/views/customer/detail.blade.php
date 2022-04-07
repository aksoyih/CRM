@extends('layout')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$customer->name}} {{$customer->surname}} Details</div>
  
                <div class="card-body">
                    <div class="row">
                        <div class="col-6"><a href="{{ route('customer.complaints', $customer->id) }}" class="btn btn-primary form-control">{{$complaintCount}} Complaints</a></div>
                        <div class="col-6"><a href="{{ route('customer.suggestions', $customer->id) }}" class="btn btn-primary form-control">{{$suggestionCount}} Suggestions</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection