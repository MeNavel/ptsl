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
                        <h5 class="card-title">Nominatif Pendaftaran Sertifikat Tanah Desa Pondokjoyo</h5>
                        <a href="/pondokjoyo/create" class="btn btn-primary">Tambah Data</a>
                        <a href="/downloadpondokjoyo" class="btn btn-primary">Download Excel</a>
                        <br><br>
                        <!-- Small tables -->
                        <div class="table-responsive">
                            <table class="table table-bordered data-table" style="width:100%">
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
                                    ajax: "{{ route('pondokjoyo.index') }}",
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
                                            width: "5%",
                                            orderable: false,
                                            searchable: false,
                                            className: "dt-head-center dt-body-center"
                                        },
                                    ],
                                });
                                $(document).on('click', '.delete-btn', function() {
                                    Swal.fire({
                                        title: 'Are you sure?',
                                        text: "You won't be able to revert this!",
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'Yes, delete it!'
                                    }).then((result) => {
                                        if (result.value) {
                                            var id = $(this).data('id');
                                            $.ajax({
                                                url: "/pondokjoyo/" + id + "/destroy",
                                                type: 'GET',
                                                data: {
                                                    '_token': $('meta[name="csrf-token"]').attr('content'),
                                                    'id': id
                                                },
                                                success: function(data) {
                                                    table.draw();
                                                    Swal.fire(
                                                        'Deleted!',
                                                        'Your file has been deleted.',
                                                        'success'
                                                    );
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
