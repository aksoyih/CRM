@extends('layout')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Complaint <b>#{{$complaint->id}}</b> details</div>
  
                <div class="card-body">
                    <h5>Complaint Details</h5>

                    <div class="col-12">Created by {{$complaint->Creator->name}} ({{date("d.m.Y H:i", strtotime($complaint->created_at))}})</div>
                    @if($complaint->Updater)
                        <div class="col-12">Updated by {{$complaint->Updater->name}} ({{date("d.m.Y H:i", strtotime($complaint->updated_at))}})</div>
                    @endif

                    <div class="col-12 m-4">Complaint: {{$complaint->complaint}}</div>


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