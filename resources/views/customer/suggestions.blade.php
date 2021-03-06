@extends('layout')
  
@section('content')
<div class="container">
    <div class="d-flex justify-content-end m-2">
        <a href="{{route('customer.suggestions.new', $id)}}" class="pull-right"><button class="btn btn-success">New Suggestion</button></a>
    </div>

    <div class="row justify-content-center">
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Suggestion</th>
                        <th scope="col">Time</th>
                        <th scope="col">Status</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($suggestions as $suggestion)
                    <tr>
                        <td>{{ $suggestion->suggestion }}</td>
                        <td>{{ $suggestion->created_at }}</td>
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