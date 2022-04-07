@extends('layout')
  
@section('content')
<div class="container">
    <div class="d-flex justify-content-end m-2">
        <a href="" class="pull-right"><button class="btn btn-success">New Complaint</button></a>
    </div>

    <div class="row">
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Complaint</th>
                        <th scope="col">Customer</th>
                        <th scope="col" width='15%'>Date</th>
                        <th scope="col" width='20%'></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($complaints as $complaint)
                    <tr>
                        <td>{{ $complaint->complaint }}</td>
                        <td>{{ $complaint->customer->name }} {{ $complaint->customer->surname }}</td>
                        <td>{{ date("d.m.Y H:i", strtotime($complaint->created_at)) }}</td>
                        <td>
                            <div class="col-lg-12" style="text-align: left;">
                                <a href="{{ route('complaint.detail', $complaint->id) }}" class="btn btn-primary">Show</a>
                                <a href="{{ route('complaint.update', $complaint->id) }}" class="btn btn-success">Update</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection