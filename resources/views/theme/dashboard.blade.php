@extends('theme.master')
@section('content')

<h1 class="mt-4">Dashboard Analysis</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Results</li>
</ol>

<div class="row">
    <div class="col-xl-6">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-chart-area me-1"></i>
                Area Chart "Play With Hero"
            </div>
            <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-chart-bar me-1"></i>
                Bar Chart "Play With Hero"
            </div>
            <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
        </div>
    </div>
</div>

<div class="container">
    <h1>Admin Dashboard "Play With Hero"</h1>
    <br>
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

   
    
@endsection
