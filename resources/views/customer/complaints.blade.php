@extends('layout')
  
@section('content')
<div class="container">
    <div class="d-flex justify-content-end m-2">
        <a href="{{route('customer.complaints.new', $id)}}" class="pull-right"><button class="btn btn-success">New Complaint</button></a>
    </div>

    <div class="row justify-content-center">
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Complaint</th>
                        <th scope="col">Time</th>
                        <th scope="col">Status</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($complaints as $complaint)
                    <tr>
                        <td>{{ $complaint->complaint }}</td>
                        <td>{{ $complaint->created_at }}</td>
                        <td> - </td>
                        <td>
                            
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection