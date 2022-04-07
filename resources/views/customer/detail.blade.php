@extends('layout')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$customer->name}} {{$customer->surname}} Details</div>
  
                <div class="card-body">
                    <div class="row">
                        <div class="col-6"><a href="{{ route('customer.complaints', $customer->id) }}" class="btn btn-primary form-control">{{$complaints['count']}} Complaints</a></div>
                        <div class="col-6"><a href="{{ route('customer.suggestions', $customer->id) }}" class="btn btn-primary form-control">{{$suggestions['count']}} Suggestions</a></div>
                    </div>

                    <canvas id="chart-line-complaints" width="299" height="200" class="chartjs-render-monitor" style="display: block; width: 299px; height: 200px;"></canvas>

                    <canvas id="chart-line-suggestions" width="299" height="200" class="chartjs-render-monitor" style="display: block; width: 299px; height: 200px;"></canvas>


                </div>
            </div>
        </div>
    </div>
</div>

<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js'></script>
<script>;
    $(document).ready(function() {
        var ctx_complaints = $("#chart-line-complaints");
        var ctx_suggestions = $("#chart-line-suggestions");

        var myLineChart_complaints = new Chart(ctx_complaints, {
            type: 'pie',
            data: {
                labels: ["Started", "Completed", "Cancelled", "New"],
                datasets: [{
                    data: [ {{$complaints['started']}}, {{$complaints['completed']}}, {{$complaints['cancelled']}}, {{$complaints['new']}}],
                    backgroundColor: ["rgba(255, 0, 0, 0.5)", "rgba(100, 255, 0, 0.5)", "rgba(200, 50, 255, 0.5)", "rgba(0, 100, 255, 0.5)"]
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Complaints'
                }
            }
        });

        var myLineChart_suggestions = new Chart(ctx_suggestions, {
            type: 'pie',
            data: {
                labels: ["Started", "Completed", "Cancelled", "New"],
                datasets: [{
                    data: [ {{$suggestions['started']}}, {{$suggestions['completed']}}, {{$suggestions['cancelled']}}, {{$suggestions['new']}}],
                    backgroundColor: ["rgba(255, 0, 0, 0.5)", "rgba(100, 255, 0, 0.5)", "rgba(200, 50, 255, 0.5)", "rgba(0, 100, 255, 0.5)"]
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Suggestions'
                }
            }
        });

        
    });
</script>

@endsection