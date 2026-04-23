@extends(backpack_view('blank'))

@php
    $breadcrumbs = [
        trans('backpack::crud.admin') => backpack_url('dashboard'),
        'Dashboard' => false,
    ];
@endphp

@section('header')
    <section class="container-fluid d-flex align-items-center">
        <h2><span>Dashboard</span> <small>PSB Zabitsa</small></h2>
    </section>
@endsection

@section('content')
    <div class="row mt-2">

        {{-- Stat Card: Total --}}
        <div class="col-sm-6 col-lg-3 mb-3">
            <div class="card card-sm">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <span class="avatar" style="background:#4A3B2A;color:#B59551;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z" />
                                </svg>
                            </span>
                        </div>
                        <div class="col">
                            <div class="font-weight-medium text-muted">Total Santri Terdaftar</div>
                            <div style="font-size:2rem;font-weight:700;color:#4A3B2A;">{{ $totalSantri }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Stat Card: Sudah Datang --}}
        <div class="col-sm-6 col-lg-3 mb-3">
            <div class="card card-sm">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <span class="avatar" style="background:#4A3B2A;color:#B59551;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path d="M9 16.17L4.83 12 3.41 13.41 9 19 21 7l-1.41-1.41L9 16.17z" />
                                </svg>
                            </span>
                        </div>
                        <div class="col">
                            <div class="font-weight-medium text-muted">Sudah Datang</div>
                            <div style="font-size:2rem;font-weight:700;color:#4A3B2A;">{{ $sudahDatang }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Stat Card: Belum Datang --}}
        <div class="col-sm-6 col-lg-3 mb-3">
            <div class="card card-sm">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <span class="avatar" style="background:#4A3B2A;color:#B59551;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z" />
                                </svg>
                            </span>
                        </div>
                        <div class="col">
                            <div class="font-weight-medium text-muted">Belum Datang</div>
                            <div style="font-size:2rem;font-weight:700;color:#4A3B2A;">{{ $belumDatang }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Stat Card: Diverifikasi --}}
        <div class="col-sm-6 col-lg-3 mb-3">
            <div class="card card-sm">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <span class="avatar" style="background:#4A3B2A;color:#B59551;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm-5 14H4v-2h11v2zm5-4H4v-2h16v2zm0-4H4V8h16v2z" />
                                </svg>
                            </span>
                        </div>
                        <div class="col">
                            <div class="font-weight-medium text-muted">Diverifikasi</div>
                            <div style="font-size:2rem;font-weight:700;color:#4A3B2A;">{{ $diverifikasi }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-2">
        {{-- Chart: Education Level Pie --}}
        <div class="col-md-5 mb-4">
            <div class="card">
                <div class="card-header" style="background:#4A3B2A;color:#F8F5F0;">
                    <h3 class="card-title">Sebaran Jenjang Pendidikan</h3>
                </div>
                <div class="card-body">
                    <canvas id="eduChart" height="280"></canvas>
                </div>
            </div>
        </div>

        {{-- Chart: Kedatangan Bar --}}
        <div class="col-md-7 mb-4">
            <div class="card">
                <div class="card-header" style="background:#4A3B2A;color:#F8F5F0;">
                    <h3 class="card-title">Status Verifikasi & Kedatangan</h3>
                </div>
                <div class="card-body">
                    <canvas id="statusChart" height="280"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        {{-- Recent Registrations --}}
        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-header" style="background:#4A3B2A;color:#F8F5F0;">
                    <h3 class="card-title">Pendaftar Terbaru</h3>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-vcenter table-hover card-table">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Lembaga</th>
                                    <th>Pendidikan Terakhir</th>
                                    <th>Kedatangan</th>
                                    <th>Verifikasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentSantri as $s)
                                    <tr>
                                        <td><code>{{ $s->kode_pendaftaran }}</code></td>
                                        <td>{{ $s->nama }}</td>
                                        <td>{{ $s->lembaga->nama_lembaga ?? '-' }}</td>
                                        <td>{{ $s->nama_pendidikan_terakhir }}</td>
                                        <td>
                                            @if ($s->status_kedatangan === 'sudah_datang')
                                                <span class="badge bg-success">Sudah Datang</span>
                                            @else
                                                <span class="badge bg-danger">Belum Datang</span>
                                            @endif
                                        </td>
                                        <td>
                                            @php $v = $s->status_verifikasi; @endphp
                                            @if ($v === 'diverifikasi')
                                                <span class="badge bg-success">Diverifikasi</span>
                                            @elseif($v === 'ditolak')
                                                <span class="badge bg-danger">Ditolak</span>
                                            @else
                                                <span class="badge bg-warning">Proses</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted py-4">Belum ada data pendaftar.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('after_scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <script>
        // Education Level Pie Chart
        const eduCtx = document.getElementById('eduChart');
        new Chart(eduCtx, {
            type: 'doughnut',
            data: {
                labels: @json(array_keys($eduGroups)),
                datasets: [{
                    data: @json(array_values($eduGroups)),
                    // Tambahkan lebih banyak warna senada agar cukup untuk semua lembaga
                    backgroundColor: [
                        '#4A3B2A', // Dark Brown
                        '#B59551', // Gold
                        '#D4B483', // Light Gold
                        '#8B7355', // Muted Brown
                        '#E8E0D5', // Cream/Beige
                        '#2E2518', // Very Dark Brown
                        '#C2A878', // Warm Sand
                        '#6B5440', // Medium Brown
                        '#A3865D' // Antique Bronze
                    ],
                    borderWidth: 0,
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            color: '#4A3B2A',
                            font: {
                                family: "'Inter', sans-serif"
                            }
                        }
                    }
                }
            }
        });

        // Status Bar Chart
        const statusCtx = document.getElementById('statusChart');
        new Chart(statusCtx, {
            type: 'bar',
            data: {
                labels: ['Sudah Datang', 'Belum Datang', 'Diverifikasi', 'Proses Verif.', 'Ditolak'],
                datasets: [{
                    label: 'Jumlah Santri',
                    data: [{{ $sudahDatang }}, {{ $belumDatang }}, {{ $diverifikasi }},
                        {{ $prosesVerif }}, {{ $ditolak }}
                    ],
                    backgroundColor: ['#4A3B2A', '#B59551', '#D4B483', '#8B7355', '#E8E0D5'],
                    borderRadius: 6,
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    x: {
                        ticks: {
                            color: '#4A3B2A',
                            font: {
                                family: "'Inter', sans-serif"
                            }
                        },
                        grid: {
                            display: false
                        }
                    },
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1,
                            color: '#4A3B2A'
                        },
                        grid: {
                            color: '#f0f0f0'
                        }
                    }
                }
            }
        });
    </script>
@endpush
