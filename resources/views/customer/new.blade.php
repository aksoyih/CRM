@extends('layout')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">New Customer</div>
  
                <div class="card-body">
                    <form action="{{ route('customer.save') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Customer Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Customer Surname</label>
                            <input type="text" class="form-control" name="surname">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Customer Company</label>
                            <input type="text" class="form-control" name="company">
                        </div>
                        <button type="submit" class="btn btn-primary form-control">Save Customer</button>
                    </form>
                </div>

                                  @if ($errors)
                                      <span class="text-danger">{{ $errors->first() }}</span>
                                  @endif
            </div>
        </div>
    </div>
</div>

@endsection