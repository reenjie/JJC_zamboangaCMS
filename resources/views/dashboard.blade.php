@extends('layouts.app', ['activePage' => 'dashboard', 'title' => 'ZCIBT', 'navName' => 'Dashboard', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        @php
        $members = DB::select('select * from partners where members = 1');
        $pledge  = DB::select('select * from pledges');
        $volunteers = DB::select('select * from partners where volunteer = 1');
        $partner    = DB::select('select * from partners where partnership = 1');
    @endphp

        <div class="container-fluid">
         
           <div class="row">
            <div class="col-md-3">
                <div class="card shadow-lg" style="border-right:10px solid #F6E1C3;border-radius:15px ">
                    <div class="card-body">
                        <h5 style="font-weight:bold;color:#A84448">Members</h5>
                        <span style="font-weight:bold;font-size:25px;color:#E9A178">{{count($members)}}</span>
                       <div style="position:absolute;right:20px;top:20px">
                        <i class="fas fa-users" style="font-size:50px;color:#E9A178"> </i>
                       </div>   
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card shadow-lg" style="border-right:10px solid #9DC08B;border-radius:15px ">
                    <div class="card-body">
                        <h5 style="font-weight:bold;color:#A84448">Pledges</h5>
                        <span style="font-weight:bold;font-size:25px;color:#40513B">{{count($pledge)}}</span>
                       <div style="position:absolute;right:20px;top:20px">
                        <i class="fas fa-money" style="font-size:50px;color:#40513B"> </i>
                       </div>   
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card shadow-lg" style="border-right:10px solid #F48484;border-radius:15px ">
                    <div class="card-body">
                        <h5 style="font-weight:bold;color:#A84448">Volunteers</h5>
                        <span style="font-weight:bold;font-size:25px;color:#F55050">{{count($volunteers)}}</span>
                       <div style="position:absolute;right:20px;top:20px">
                        <i class="fas fa-user-circle" style="font-size:50px;color:#F55050"> </i>
                       </div>   
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card shadow-lg" style="border-right:10px solid #7286D3;border-radius:15px ">
                    <div class="card-body">
                        <h5 style="font-weight:bold;color:#A84448">Partnerships</h5>
                        <span style="font-weight:bold;font-size:25px;color:#7286D3">{{count($partner)}}</span>
                       <div style="position:absolute;right:20px;top:20px">
                        <i class="fas fa-sync" style="font-size:50px;color:#8EA7E9"> </i>
                       </div>   
                    </div>
                </div>
            </div>

            <div class="col-md-12 mt-5">
                <div id="chartContainer" style="height: 300px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
            </div>
           </div>
        </div>
    </div>
@endsection

@push('js')
<script>
    window.onload = function() {
    
    var chart = new CanvasJS.Chart("chartContainer", {
        theme: "light2", // "light1", "light2", "dark1", "dark2"
        exportEnabled: true,
        animationEnabled: true,
        title: {
            text: "JJC Zamboanga Data Chart Presentation"
        },
        data: [{
            type: "pie",
            startAngle: 25,
            toolTipContent: "<b>{label}</b>: {y}%",
            showInLegend: "true",
            legendText: "{label}",
            indexLabelFontSize: 16,
            indexLabel: "{label} - {y}%",
            dataPoints: [
                { y:{{count($members)}} , label: "Members" },
                { y: {{count($pledge)}}, label: "Pledges" },
                { y: {{count($volunteers)}}, label: "Volunteers" },
                { y: {{count($partner)}}, label: "Partnerships" },
             
            ]
        }]
    });
    chart.render();
    
    }
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            // Javascript method's body can be found in assets/js/demos.js
            demo.initDashboardPageCharts();

          //  demo.showNotification();

        });
    </script>
@endpush