@extends('layout')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Suggestion <b>#{{$suggestion->id}}</b> details</div>
  
                <div class="card-body">
                    <h5>Suggestion Details</h5>

                    <div class="col-12">Created by {{$suggestion->Creator->name}} ({{date("d.m.Y H:i", strtotime($suggestion->created_at))}})</div>
                    @if($suggestion->Updater)
                        <div class="col-12">Updated by {{$suggestion->Updater->name}} ({{date("d.m.Y H:i", strtotime($suggestion->updated_at))}})</div>
                    @endif

                    <div class="col-12 m-4">Suggestion: {{$suggestion->suggestion}}</div>


                    <h5>Updates</h5>
                    <table>
                        <thead>
                            <tr>
                                <th width="13%">Date</th>
                                <th>Update</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($updates as $update)
                                <tr>
                                    <td>{{date("d.m.Y H:i", strtotime($update->created_at))}}</td>
                                    <td>{{$update->update}}</td>
                                    <td>{{ucfirst($update->update_type)}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection