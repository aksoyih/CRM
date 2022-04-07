@extends('layout')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Complaint</th>
                        <th scope="col">Customer</th>
                        <th scope="col">Date</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($complaints as $complaint)
                    <tr>
                        <td>{{ $complaint->complaint }}</td>
                        <td>{{ $complaint->customer->name }} {{ $complaint->customer->surname }}</td>
                        <td>{{ $complaint->date }}</td>
                        <td>
                            <a href="{{ route('complaint.detail', $complaint->id) }}" class="btn btn-primary">Show</a>
                            <a href="{{ route('complaint.update', $complaint->id) }}" class="btn btn-primary">Update</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection