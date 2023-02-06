@extends('mainlayout')

@extends('layouts.navbar')

@section('content')
    {{-- <main id="main" class="main"> --}}

    {{-- <div class="pagetitle">
            <h1>K1</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Puldatan</a></li>
                    <li class="breadcrumb-item">Data</li>
                    <li class="breadcrumb-item active">K1</li>
                </ol>
            </nav>
        </div><!-- End Page Title --> --}}
    <br>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="container card">
                    <div class="card-body">
                        <h5 class="card-title">Nominatif Pendaftaran Sertifikat Tanah Desa Mundurejo</h5>
                        <a href="/mundurejo/create" class="btn btn-primary">Tambah Data</a>
                        <a href="/downloadmundurejo" class="btn btn-primary">Download Excel</a>
                        <br><br>
                        <!-- Small tables -->
                        <table class="table table-bordered data-table">
                            <thead>
                                <tr style="vertical-align: middle;">
                                    <th scope="col">No Nominatif</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">NUB</th>
                                    <th scope="col">Luas Ukur</th>
                                    <th scope="col">Luas Permohonan</th>
                                    <th scope="col">Beda Luas</th>
                                    <th scope="col">Koordinator</th>
                                    <th width="col">Action</th>
                                </tr>
                            </thead>
                        </table>
                        <!-- End small tables -->
                        <script type="text/javascript">
                            $(function() {

                                var table = $('.data-table').DataTable({
                                    processing: true,
                                    serverSide: true,
                                    order: [[0, 'desc']],
                                    ajax: "{{ route('mundurejo.index') }}",
                                    columns: [{
                                            data: 'id',
                                            name: 'id',
                                            width: "5%",
                                            className: "dt-head-center dt-body-center"
                                        },
                                        {
                                            data: 'Nama',
                                            name: 'Nama',
                                            className: "dt-head-center"
                                        },
                                        {
                                            orderable: false,
                                            width: "5%",
                                            data: 'NUB',
                                            name: 'NUB',
                                            className: "dt-head-center dt-body-center"
                                        },
                                        {
                                            orderable: false,
                                            width: "5%",
                                            data: 'Luas_Ukur',
                                            name: 'Luas_Ukur',
                                            className: "dt-head-center dt-body-center"
                                        },
                                        {
                                            orderable: false,
                                            data: 'Luas_Permohonan',
                                            width: "5%",
                                            name: 'Luas_Permohonan',
                                            className: "dt-head-center dt-body-center"
                                        },
                                        {
                                            data: 'Selisih_Luas',
                                            width: "5%",
                                            name: 'Selisih_Luas',
                                            className: "dt-head-center dt-body-center"
                                        },
                                        {
                                            data: 'Koordinator',
                                            name: 'Koordinator',
                                            width: "5%"
                                        },
                                        {
                                            data: 'action',
                                            name: 'action',
                                            width: "10%",
                                            orderable: false,
                                            searchable: false,
                                            className: "dt-head-center dt-body-center"
                                        },
                                    ],
                                });

                            });
                        </script>
                    </div>
                </div>

            </div>
        </div>

    </section>
    {{-- </main><!-- End #main --> --}}
@endsection
