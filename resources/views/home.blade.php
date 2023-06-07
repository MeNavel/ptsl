@extends('mainlayout')

@include('partials.sidebar')

@section('content')
    <main class="main" id="main">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <section class="section dashboard">
                    <div class="row">

                        <!-- Left side columns -->
                        <div class="col-lg-12">
                            <div class="row">

                                <div class="col">
                                    <div class="card info-card sales-card">
                                        <div class="card-body">
                                            <h5 class="card-title">Mundurejo <span>| NIB</span></h5>

                                            <div class="d-flex align-items-center">
                                                <div
                                                    class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                    <i class="bi bi-geo-alt"></i>
                                                </div>
                                                <div class="ps-3">
                                                    <h6>{{ $nib_mundurejo }}</h6>
                                                    <span
                                                        class="text-danger small pt-1 fw-bold">{{ $belum_nib_mundurejo }}</span>
                                                    <span class="text-muted small pt-2 ps-1">Belum NIB</span>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="d-flex align-items-center">
                                                <div
                                                    class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                    <i class="bi bi-file-earmark-word"></i>
                                                </div>
                                                <div class="ps-3">
                                                    <h6>{{ $nib_mundurejo + $belum_nib_mundurejo }}</h6>
                                                    <span class="text-dark small pt-1 fw-bold">Total Pendaftar</span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="col">
                                    <div class="card info-card sales-card">
                                        <div class="card-body">
                                            <h5 class="card-title">Pondok Joyo <span>| NIB</span></h5>

                                            <div class="d-flex align-items-center">
                                                <div
                                                    class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                    <i class="bi bi-geo-alt"></i>
                                                </div>
                                                <div class="ps-3">
                                                    <h6>{{ $nib_pondokjoyo }}</h6>
                                                    <span
                                                        class="text-danger small pt-1 fw-bold">{{ $belum_nib_pondokjoyo }}</span>
                                                    <span class="text-muted small pt-2 ps-1">Belum NIB</span>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="d-flex align-items-center">
                                                <div
                                                    class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                    <i class="bi bi-file-earmark-word"></i>
                                                </div>
                                                <div class="ps-3">
                                                    <h6>{{ $nib_pondokjoyo + $belum_nib_pondokjoyo }}</h6>
                                                    <span class="text-dark small pt-1 fw-bold">Total Pendaftar</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="card info-card sales-card">
                                        <div class="card-body">
                                            <h5 class="card-title">Sumberagung <span>| NIB</span></h5>

                                            <div class="d-flex align-items-center">
                                                <div
                                                    class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                    <i class="bi bi-geo-alt"></i>
                                                </div>
                                                <div class="ps-3">
                                                    <h6>{{ $nib_sumberagung }}</h6>
                                                    <span
                                                        class="text-danger small pt-1 fw-bold">{{ $belum_nib_sumberagung }}</span>
                                                    <span class="text-muted small pt-2 ps-1">Belum NIB</span>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="d-flex align-items-center">
                                                <div
                                                    class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                    <i class="bi bi-file-earmark-word"></i>
                                                </div>
                                                <div class="ps-3">
                                                    <h6>{{ $nib_sumberagung + $belum_nib_sumberagung }}</h6>
                                                    <span class="text-dark small pt-1 fw-bold">Total Pendaftar</span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="col">
                                    <div class="card info-card sales-card">
                                        <div class="card-body">
                                            <h5 class="card-title">Sidomekar <span>| NIB</span></h5>

                                            <div class="d-flex align-items-center">
                                                <div
                                                    class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                    <i class="bi bi-geo-alt"></i>
                                                </div>
                                                <div class="ps-3">
                                                    <h6>{{ $nib_sidomekar }}</h6>
                                                    <span
                                                        class="text-danger small pt-1 fw-bold">{{ $belum_nib_sidomekar }}</span>
                                                    <span class="text-muted small pt-2 ps-1">Belum NIB</span>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="d-flex align-items-center">
                                                <div
                                                    class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                    <i class="bi bi-file-earmark-word"></i>
                                                </div>
                                                <div class="ps-3">
                                                    <h6>{{ $nib_sidomekar + $belum_nib_sidomekar }}</h6>
                                                    <span class="text-dark small pt-1 fw-bold">Total Pendaftar</span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div><!-- End Left side columns -->
                    </div>
                </section>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h5 class="card-title">Koordinator Pondok Joyo</h5>
                                    <div id="chart_koordinator_pondokjoyo"></div>
                                </div>
                                <div class="col-lg-6">
                                    <h5 class="card-title">Koordinator Mundurejo</h5>
                                    <div id="chart_koordinator_mundurejo"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- script koordinator pondokjoyo --}}
                <script>
                    document.addEventListener("DOMContentLoaded", () => {
                        new ApexCharts(document.querySelector("#chart_koordinator_pondokjoyo"), {
                            series: [{
                                name: "Jumlah Pendaftar ",
                                data: [
                                    @foreach ($data_koordinator_pondokjoyo as $item)
                                        {{ $item }},
                                    @endforeach
                                ]
                            }],
                            chart: {
                                type: 'bar',
                                height: 800
                            },
                            plotOptions: {
                                bar: {
                                    borderRadius: 4,
                                    horizontal: true,
                                }
                            },
                            dataLabels: {
                                enabled: true,
                                offsetX: -6,
                                style: {
                                    fontSize: '12px',
                                    colors: ['#fff']
                                }
                            },
                            xaxis: {
                                categories: [
                                    @foreach ($koordinator_pondokjoyo as $item)
                                        '{{ $item }}',
                                    @endforeach
                                ],
                            },
                        }).render();
                    });
                </script>
                {{-- script koordinator mundurejo --}}
                <script>
                    document.addEventListener("DOMContentLoaded", () => {
                        new ApexCharts(document.querySelector("#chart_koordinator_mundurejo"), {
                            series: [{
                                name: "Jumlah Pendaftar ",
                                data: [
                                    @foreach ($data_koordinator_mundurejo as $item)
                                        {{ $item }},
                                    @endforeach
                                ]
                            }],
                            chart: {
                                type: 'bar',
                                height: 800
                            },
                            plotOptions: {
                                bar: {
                                    borderRadius: 4,
                                    horizontal: true,
                                }
                            },
                            dataLabels: {
                                enabled: true,
                                offsetX: -6,
                                style: {
                                    fontSize: '12px',
                                    colors: ['#fff']
                                }
                            },
                            xaxis: {
                                categories: [
                                    @foreach ($koordinator_mundurejo as $item)
                                        '{{ $item }}',
                                    @endforeach
                                ],
                            },
                        }).render();
                    });
                </script>
            </div>
        </div>
    </main>
@endsection
