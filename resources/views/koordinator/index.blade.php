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
                        <h5 class="card-title">Data Koordinator 3 Desa</h5>
                        <a href="/koordinator/create" class="btn btn-primary">Tambah Data</a>
                        <br><br>
                        <!-- Small tables -->
                        <div class="table-responsive">
                            <table class="table table-bordered data-table" style="width:100%">
                                <thead>
                                    <tr style="vertical-align: middle;">
                                        <th scope="col">NIK</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Dusun</th>
                                        <th scope="col">Desa</th>
                                        <th scope="col">Jabatan</th>
                                        <th scope="col">Action</th>
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
                                    order: [
                                        [0, 'desc']
                                    ],
                                    ajax: "{{ route('koordinator.index') }}",
                                    columns: [{
                                            data: 'nik',
                                            name: 'nik',
                                            className: "dt-head-center dt-body-center"
                                        },
                                        {
                                            data: 'nama',
                                            name: 'nama',
                                            className: "dt-head-center"
                                        },
                                        {
                                            orderable: false,
                                            data: 'dusun',
                                            name: 'dusun',
                                            className: "dt-head-center dt-body-center"
                                        },
                                        {
                                            orderable: false,
                                            data: 'desa',
                                            name: 'desa',
                                            className: "dt-head-center dt-body-center"
                                        },
                                        {
                                            orderable: false,
                                            data: 'jabatan',
                                            name: 'jabatan',
                                            className: "dt-head-center dt-body-center"
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
                                                url: "/koordinator/" + id + "/destroy",
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
