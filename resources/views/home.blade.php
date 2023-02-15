@extends('mainlayout')

@extends('layouts.navbar')

@section('content')
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    

                    <div class="card-body">
                        <h5 class="card-title text-center">Navigation</h5>
                        <div class="text-center">
                            <a href="/pondokjoyo" class="btn btn-primary">Pondokjoyo</a>
                            <a href="/mundurejo" class="btn btn-primary">Mundurejo</a>
                            <a href="/sidomekar" class="btn btn-primary">Sidomekar</a>
                            @if (Auth::user()->id == '1')
                                <a href="/koordinator" class="btn btn-primary">Koordinator</a>
                                <a class="btn btn-primary" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <h5 class="card-title">Sidomekar</h5>
                                <div id="chart_sidomekar"></div>
                            </div>
                            <div class="col-lg-4">
                                <h5 class="card-title">Mundurejo</h5>
                                <div id="chart_mundurejo"></div>
                            </div>
                            <div class="col-lg-4">
                                <h5 class="card-title">Pondok Joyo</h5>
                                <div id="chart_pondokjoyo"></div>
                            </div>
                            
                            
                          </div>
                    </div>
                </div>
            </div>
        {{-- script pondokjoyo --}}
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                new ApexCharts(document.querySelector("#chart_pondokjoyo"), {
                    series: [
                        @foreach ($data_dusun_pondokjoyo as $item)
                            {{ $item }},
                        @endforeach
                    ],
                    chart: {
                        height: 350,
                        type: 'donut',
                        toolbar: {
                            show: true
                        }
                    },
                    labels: [
                        @foreach ($dusun_pondokjoyo as $item)
                            '{{ $item }}',
                        @endforeach
                    ],
                    plotOptions: {
                        pie: {
                            donut: {
                                labels: {
                                    show: true,
                                    total: {
                                        showAlways: true,
                                        show: true
                                    }
                                }
                            }
                        }
                    },
                    dataLabels: {
                        formatter: function(val, opts) {
                            return opts.w.config.series[opts.seriesIndex]
                        },
                    },
                }).render();
            });
        </script>
        {{-- script mundurejo --}}
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                new ApexCharts(document.querySelector("#chart_mundurejo"), {
                    series: [
                        @foreach ($data_dusun_mundurejo as $item)
                            {{ $item }},
                        @endforeach
                    ],
                    chart: {
                        height: 350,
                        type: 'donut',
                        toolbar: {
                            show: true
                        }
                    },
                    labels: [
                        @foreach ($dusun_mundurejo as $item)
                            '{{ $item }}',
                        @endforeach
                    ],
                    plotOptions: {
                        pie: {
                            donut: {
                                labels: {
                                    show: true,
                                    total: {
                                        showAlways: true,
                                        show: true
                                    }
                                }
                            }
                        }
                    },
                    dataLabels: {
                        formatter: function(val, opts) {
                            return opts.w.config.series[opts.seriesIndex]
                        },
                    },
                }).render();
            });
        </script>
        {{-- script sidomekar --}}
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                new ApexCharts(document.querySelector("#chart_sidomekar"), {
                    series: [
                        @foreach ($data_dusun_sidomekar as $item)
                            {{ $item }},
                        @endforeach
                    ],
                    chart: {
                        height: 350,
                        type: 'donut',
                        toolbar: {
                            show: true
                        }
                    },
                    labels: [
                        @foreach ($dusun_sidomekar as $item)
                            '{{ $item }}',
                        @endforeach
                    ],
                    plotOptions: {
                        pie: {
                            donut: {
                                labels: {
                                    show: true,
                                    total: {
                                        showAlways: true,
                                        show: true
                                    }
                                }
                            }
                        }
                    },
                    dataLabels: {
                        formatter: function(val, opts) {
                            return opts.w.config.series[opts.seriesIndex]
                        },
                    },
                }).render();
            });
        </script>
    </div>
@endsection
