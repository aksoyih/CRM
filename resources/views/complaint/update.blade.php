@extends('layout')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update Complaint <b>#{{$complaint->id}}</b></div>
  
                <div class="card-body">
                    <form action="{{ route('complaint.update.save', $complaint->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Update Type</label>
                            <select name="update_type" class="form-control">
                                <option value="0">Select an update type</option>
                                <option value="started">Started</option>
                                <option value="completed">Completed</option>
                                <option value="canceled">Canceled</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Update Text</label>
                            <textarea class="form-control" name="update" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary form-control">Save Update</button>
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