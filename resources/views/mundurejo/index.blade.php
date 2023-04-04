@extends('mainlayout')

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
                <div class="container-fluid card">
                    <div class="card-body">
                        <h5 class="card-title">Nominatif Pendaftaran Sertifikat Tanah Desa Mundurejo</h5>
                        <a href="/mundurejo/create" class="btn btn-primary">Tambah Data</a>
                        <a href="/downloadmundurejo" class="btn btn-primary">Download Excel</a>
                        <br><br>
                        <!-- Small tables -->
                        <div class="table-responsive">
                            <table class="table table-bordered data-table" style="width:100%">
                                <thead>
                                    <tr style="vertical-align: middle;">
                                        <th scope="col">No Nominatif</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Nomor Berkas</th>
                                        <th scope="col">NIB</th>
                                        <th scope="col">Luas Ukur</th>
                                        <th scope="col">Luas Permohonan</th>
                                        <th scope="col">Beda Luas</th>
                                        <th scope="col">Tahun 1</th>
                                        <th scope="col">Nama 1</th>
                                        <th scope="col">Tahun 2</th>
                                        <th scope="col">Nama 2</th>
                                        <th scope="col">Peralihan 2</th>
                                        <th scope="col">Tahun 3</th>
                                        <th scope="col">Peralihan 3</th>
                                        <th scope="col">Koordinator</th>
                                        <th width="col">Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <!-- End small tables -->
                        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                        <script type="text/javascript">
                            $(function() {
                                var table = $('.data-table').DataTable({
                                    processing: true,
                                    serverSide: true,
                                    scrollX: true,
                                    order: [
                                        [0, 'desc']
                                    ],
                                    ajax: "{{ route('mundurejo.index') }}",
                                    columns: [
                                        {
                                            data: 'id',
                                            name: 'id',
                                            width: "5%",
                                            className: "dt-head-center dt-body-center"
                                        },
                                        {
                                            data: 'An_Nama',
                                            name: 'An_Nama',
                                            className: "dt-head-center"
                                        },
                                        {
                                            orderable: false,
                                            width: "5%",
                                            data: 'No_Berkas',
                                            name: 'No_Berkas',
                                            className: "dt-head-center dt-body-center"
                                        },
                                        {
                                            orderable: false,
                                            width: "5%",
                                            data: 'NIB',
                                            name: 'NIB',
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
                                            data: 'Tahun_Peralihan_1',
                                            name: 'Tahun_Peralihan_1',
                                            className: "dt-head-center dt-body-center",
                                            width: "5%"
                                        },
                                        {
                                            data: 'Peralihan_1_Kepada',
                                            name: 'Peralihan_1_Kepada',
                                            className: "dt-head-center dt-body-center",
                                        },
                                        {
                                            data: 'Tahun_Peralihan_2',
                                            name: 'Tahun_Peralihan_2',
                                            className: "dt-head-center dt-body-center",
                                            width: "5%"
                                        },
                                        {
                                            data: 'Peralihan_2_Kepada',
                                            name: 'Peralihan_2_Kepada',
                                            className: "dt-head-center dt-body-center",
                                        },
                                        {
                                            data: 'Dasar_Peralihan_2',
                                            name: 'Dasar_Peralihan_2',
                                            className: "dt-head-center dt-body-center",
                                        },
                                        {
                                            data: 'Tahun_Perolehan_Terakhir',
                                            name: 'Tahun_Perolehan_Terakhir',
                                            className: "dt-head-center dt-body-center",
                                            width: "5%"
                                        },
                                        {
                                            data: 'Alas_Hak_Bukti_Perolehan',
                                            name: 'Alas_Hak_Bukti_Perolehan',
                                            className: "dt-head-center dt-body-center",
                                        },
                                        {
                                            data: 'Nama_Saksi_1',
                                            name: 'Nama_Saksi_1',
                                            className: "dt-head-center dt-body-center",
                                            width: "5%"
                                        },
                                        {
                                            data: 'action',
                                            name: 'action',
                                            width: "5%",
                                            orderable: false,
                                            searchable: false,
                                            className: "dt-head-center dt-body-center"
                                        },
                                    ],
                                });
                                $(document).on('click', '.delete-btn', function() {
                                    Swal.fire({
                                        title: 'Yakin Ingin Menghapus Data?',
                                        text: "Data yang dihapus tidak dapat dikembalikan",
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'Ya, Hapus Data!'
                                    }).then((result) => {
                                        if (result.value) {
                                            var id = $(this).data('id');
                                            $.ajax({
                                                url: "/mundurejo/" + id + "/destroy",
                                                type: 'GET',
                                                data: {
                                                    '_token': $('meta[name="csrf-token"]').attr('content'),
                                                    'id': id
                                                },
                                                success: function(data) {
                                                    table.draw();
                                                    Swal.fire({
                                                        position: 'mid',
                                                        icon: 'success',
                                                        title: 'Data Berhasil Dihapus',
                                                        showConfirmButton: false,
                                                        timer: 1000
                                                    })
                                                },
                                                error: function() {
                                                    Swal.fire(
                                                        'Error!',
                                                        'Error deleting data',
                                                        'error'
                                                    );
                                                }
                                            });
                                        }
                                    });
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
