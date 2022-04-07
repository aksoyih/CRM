@extends('layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Suggestion</th>
                        <th scope="col">Customer</th>
                        <th scope="col">Date</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($suggestions as $suggestion)
                    <tr>
                        <td>{{ $suggestion->suggestion }}</td>
                        <td>{{ $suggestion->customer->name }} {{ $suggestion->customer->surname }}</td>
                        <td>{{ $suggestion->date }}</td>
                        <td>
                            <a href="{{ route('suggestion.detail', $suggestion->id) }}" class="btn btn-primary">Show</a>
                            <a href="{{ route('suggestion.update', $suggestion->id) }}" class="btn btn-primary">Update</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection