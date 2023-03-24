@extends('mainlayout')

@section('content')
    <br>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="container-fluid card">
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
                                        <th scope="col">Wilayah</th>
                                        <th scope="col">Status</th>
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
                                        [4, 'asc']
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
                                            data: 'dusun',
                                            name: 'dusun',
                                            className: "dt-head-center dt-body-center"
                                        },
                                        {
                                            data: 'desa',
                                            name: 'desa',
                                            className: "dt-head-center dt-body-center"
                                        },
                                        {
                                            data: 'jabatan',
                                            name: 'jabatan',
                                            className: "dt-head-center dt-body-center"
                                        },
                                        {
                                            data: 'status',
                                            name: 'status',
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
