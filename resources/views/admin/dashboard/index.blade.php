@extends('admin.layouts.app')
@section('title', 'Dashboard')

@section('content')

<div class="row">

    <!-- USERS -->
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $users }}</h3>
                <p>Total Users</p>
            </div>
            <div class="icon"><i class="fas fa-users"></i></div>
            <a href="/users" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <!-- PRODUCTS -->
    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $products }}</h3>
                <p>Products</p>
            </div>
            <div class="icon"><i class="fas fa-box"></i></div>
            <a href="/products" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <!-- ORDERS -->
    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $orders }}</h3>
                <p>Orders</p>
            </div>
            <div class="icon"><i class="fas fa-shopping-cart"></i></div>
        </div>
    </div>

    <!-- REVENUE -->
    <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>Rp {{ number_format($revenue,0,',','.') }}</h3>
                <p>Revenue</p>
            </div>
            <div class="icon"><i class="fas fa-money-bill"></i></div>
        </div>
    </div>

</div>


<div class="row">

    <!-- LEFT -->
    <section class="col-lg-7">

        <!-- CHART -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-chart-line"></i> Sales Overview
                </h3>
            </div>

            <div class="card-body">
                <div style="height:300px;">
                    <canvas id="salesChart"></canvas>
                </div>
            </div>
        </div>

        <!-- LATEST USERS -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Latest Users</h3>
            </div>

            <div class="card-body table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($latestUsers as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>

    </section>


    <!-- RIGHT -->
    <section class="col-lg-5">

        <!-- QUICK ADD -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Quick Add User</h3>
            </div>

            <div class="card-body">
                <form action="/users" method="POST">
                    @csrf
                    <input type="text" name="name" class="form-control mb-2" placeholder="Name" required>
                    <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
                    <button class="btn btn-primary btn-sm">Add User</button>
                </form>
            </div>
        </div>

        <!-- SYSTEM STATS -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">System Stats</h3>
            </div>

            <div class="card-body">

                <div class="progress-group">
                    Users
                    <span class="float-right"><b>{{ $users }}</b></span>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-primary" style="width: 70%"></div>
                    </div>
                </div>

                <div class="progress-group">
                    Orders
                    <span class="float-right"><b>{{ $orders }}</b></span>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-success" style="width: 50%"></div>
                    </div>
                </div>

            </div>
        </div>

    </section>

</div>

@endsection



@section('scripts')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    var ctx = document.getElementById('salesChart');

    if (ctx) {
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan','Feb','Mar','Apr','May','Jun','Jul'],
                datasets: [
                    {
                        label: 'Sales',
                        data: [10,25,18,30,22,40,35],
                        borderColor: '#007bff',
                        backgroundColor: 'rgba(0,123,255,0.2)',
                        fill: true,
                        tension: 0.4
                    },
                    {
                        label: 'Orders',
                        data: [8,15,10,20,18,28,25],
                        borderColor: '#28a745',
                        backgroundColor: 'rgba(40,167,69,0.2)',
                        fill: true,
                        tension: 0.4
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });
    }
});
</script>

@endsection