@extends('theme.master')
@section('content')

<div class="container">
    <h1>Admin Dashboard</h1>
    <div class="row">
        <!-- Stats or summary cards -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Users</h5>
                    <p class="card-text">{{ $totalUsers }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Reservations</h5>
                    <p class="card-text">{{ $totalReservations }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Matches</h5>
                    <p class="card-text">{{ $totalMatches }}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Charts or other details -->
    <div class="row mt-4">
        <div class="col-md-12">
            <canvas id="dashboardChart"></canvas>
        </div>
    </div>
</div>


{{-- 
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Admin Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Charts</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                Chart.js is a third party plugin that is used to generate the charts in this template. The charts below have been customized - for further customization options, please visit the official
                                <a target="_blank" href="https://www.chartjs.org/docs/latest/">Chart.js documentation</a>
                                
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-area me-1"></i>
                                Area Chart Example
                            </div>
                            <div class="card-body"><canvas id="myAreaChart" width="100%" height="30"></canvas></div>
                            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Bar Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="50"></canvas></div>
                                    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-pie me-1"></i>
                                        Pie Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myPieChart" width="100%" height="50"></canvas></div>
                                    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                
            </div>
         --}}
        
    
@endsection
