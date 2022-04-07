@extends('layout')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">New Suggestion</div>
  
                <div class="card-body">
                    <form action="{{ route('customer.suggestions.save', $customer->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Customer Name: </label>
                            <b><span>{{$customer->name}} {{$customer->surname}}</span></b>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Suggestion</label>
                            <textarea class="form-control" name="suggestion" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary form-control">Save suggestion</button>
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