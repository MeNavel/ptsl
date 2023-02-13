@extends('mainlayout')

@extends('layouts.navbar')

@section('content')

    <br>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="container card">
                    <div class="card-body">
                        <h5 class="card-title">Formulir Koordinator</h5>
                        <form action="/koordinator">
                            <button type="submit" class="btn btn-primary">Home</button>
                        </form>
                        <br>
                        <!-- Data teknis tanah -->
                        <form action="/koordinator/store" method="POST" class="row g-3">
                            @csrf
                            {{-- Data diri pemohon --}}
                            <div class="col-2">
                                <label for="NIK" class="form-label">NIK</label>
                                <input type="text" name="NIK"
                                    class="form-control" id="NIK">
                                    <span id="cek_koordinator"></span>
                            </div>
                            <div class="col-4">
                                <label for="Nama" class="form-label">Nama</label>
                                <input type="text" name="Nama" class="form-control" id="Nama">
                            </div>
                            <div class="col-2">
                                <label for="Agama" class="form-label">Agama</label>
                                <select class="form-select" id="Agama" name="Agama" aria-label="State">
                                    <option selected>ISLAM</option>
                                    <option value="KRISTEN">KRISTEN</option>
                                    <option value="KATOLIK">KATOLIK</option>
                                    <option value="HINDU">HINDU</option>
                                    <option value="BUDHA">BUDHA</option>
                                    <option value="KONGHUCU">KONGHUCU</option>
                                </select>
                            </div>
                            <div class="col-1">
                                <label for="Usia" class="form-label">Usia</label>
                                <input type="text" name="Usia" class="form-control" id="Usia">
                            </div>                            
                            <div class="col-3">
                                <label for="Pekerjaan" class="form-label">Pekerjaan</label>
                                <input type="text" name="Pekerjaan" class="form-control" id="Pekerjaan">
                            </div>
                            <div class="col-6">
                                <label for="Alamat" class="form-label">Alamat</label>
                                <input type="text" name="Alamat" class="form-control"
                                    id="Alamat">
                            </div>
                            <div class="col-2">
                                <label for="Dusun" class="form-label">Dusun</label>
                                <select class="form-select" id="Dusun" name="Dusun"
                                    aria-label="State">
                                    <option selected>BETENG</option>
                                    <option value="BABATAN">BABATAN</option>
                                    <option value="BESUKI">BESUKI</option>
                                    <option value="SONGON">SONGON</option>
                                    <option value="PONDOK RAMPAL">PONDOK RAMPAL</option>
                                    <option value="BLOGMUNDU">BLOGMUNDU</option>
                                    <option value="SUKOMAKMUR">SUKOMAKMUR</option>
                                    <option value="TEMUREJO">TEMUREJO</option>
                                </select>
                            </div>
                            <div class="col-2">
                                <label for="Desa" class="form-label">Desa</label>
                                <select class="form-select" id="Desa" name="Desa"
                                    aria-label="State">
                                    <option selected>SIDOMEKAR</option>
                                    <option value="PONDOK JOYO">PONDOK JOYO</option>
                                    <option value="MUNDUREJO">MUNDUREJO</option>
                                </select>
                            </div>
                            <div class="col-2">
                                <label for="Jabatan" class="form-label">Jabatan</label>
                                <select class="form-select" id="Jabatan" name="Jabatan"
                                    aria-label="State">
                                    <option selected>SAKSI 1</option>
                                    <option value="SAKSI 2">SAKSI 2</option>
                                </select>
                            </div>
                            
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </form><!-- End Multi Columns Form -->
                        <script>
                            $(document).ready(function() {

                                $('#NIK').blur(function() {
                                    var NIK = $('#NIK').val();
                                    var _token = $('input[name="_token"]').val();
                                    var filter = /^(1[1-9]|21|[37][1-6]|5[1-3]|6[1-5]|[89][12])\d{2}\d{2}([04][1-9]|[1256][0-9]|[37][01])(0[1-9]|1[0-2])\d{2}\d{4}$/;
                                    if (!filter.test(NIK)) {
                                        $('#cek_koordinator').show();
                                        $('#cek_koordinator').html(
                                            '<label class="text-danger">NIK Salah</label>');
                                        $('#submit').attr('disabled', 'true');
                                    } else {
                                        $.ajax({
                                            url: "{{ route('cek-koordinator') }}",
                                            method: "POST",
                                            data: {
                                                nik: NIK,
                                                _token: _token
                                            },
                                            success: function(result) {
                                                if (result == 'not_unique') {
                                                    $('#cek_koordinator').show();
                                                    $('#cek_koordinator').html(
                                                        '<label class="text-danger">NIK Sudah Digunakan</label>'
                                                    );
                                                    $('#submit').attr('disabled', true);
                                                } else {
                                                    $('#cek_koordinator').hide();
                                                    $('#submit').attr('disabled', false);
                                                }
                                            }
                                        })
                                    }
                                });

                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
