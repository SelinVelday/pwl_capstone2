@extends('layouts.admin')

@section('title', 'Dashboard Admin')
@section('page-subtitle', 'Ringkasan data dan statistik aplikasi.')

@section('content')
<div class="row">
    {{-- Kartu Statistik Cepat --}}
    <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-primary card-round">
            <div class="card-body">
                <div class="row">
                    <div class="col-5">
                        <div class="icon-big text-center">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                    <div class="col-7 col-stats">
                        <div class="numbers">
                            <p class="card-category">Member</p>
                            <h4 class="card-title">{{ $userCounts['member'] ?? 0 }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-info card-round">
            <div class="card-body">
                <div class="row">
                    <div class="col-5">
                        <div class="icon-big text-center">
                            <i class="fas fa-user-shield"></i>
                        </div>
                    </div>
                    <div class="col-7 col-stats">
                        <div class="numbers">
                            <p class="card-category">Panitia</p>
                            <h4 class="card-title">{{ $userCounts['committee'] ?? 0 }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-success card-round">
            <div class="card-body">
                <div class="row">
                    <div class="col-5">
                        <div class="icon-big text-center">
                            <i class="fas fa-money-check-alt"></i>
                        </div>
                    </div>
                    <div class="col-7 col-stats">
                        <div class="numbers">
                            <p class="card-category">Finance</p>
                            <h4 class="card-title">{{ $userCounts['finance'] ?? 0 }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-secondary card-round">
            <div class="card-body">
                <div class="row">
                    <div class="col-5">
                        <div class="icon-big text-center">
                            <i class="fas fa-user-cog"></i>
                        </div>
                    </div>
                    <div class="col-7 col-stats">
                        <div class="numbers">
                            <p class="card-category">Admin</p>
                            <h4 class="card-title">{{ $userCounts['admin'] ?? 0 }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Grafik Pengguna --}}
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-head-row">
                    <div class="card-title">Distribusi Pengguna Berdasarkan Peran</div>
                    <div class="card-tools">
                        <span class="fw-bold text-muted">{{ $todayDate }}</span>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="chart-container">
                    <canvas id="userRoleChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
{{-- Chart.js sudah di-load oleh layout admin, kita tinggal menggunakannya --}}
<script>
    // Mengambil data dari controller yang sudah di-passing ke view
    var chartLabels = {!! json_encode($chartLabels) !!};
    var chartValues = {!! json_encode($chartValues) !!};

    var ctx = document.getElementById('userRoleChart').getContext('2d');
    var userRoleChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: chartLabels,
            datasets: [{
                label: 'Jumlah Pengguna',
                data: chartValues,
                backgroundColor: [
                    'rgba(54, 162, 235, 0.6)',  // blue for member
                    'rgba(255, 159, 64, 0.6)',  // orange for committee
                    'rgba(75, 192, 192, 0.6)',   // green for finance
                    'rgba(153, 102, 255, 0.6)'  // purple for admin
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false // Menyembunyikan legenda karena sudah jelas dari label
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        // Memastikan angka di sumbu Y adalah bilangan bulat
                        stepSize: 1
                    }
                }
            }
        }
    });
</script>
@endpush