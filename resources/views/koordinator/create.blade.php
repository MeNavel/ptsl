@extends('mainlayout')

@section('content')

    <br>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="container-fluid card">
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
                            <div class="col-5">
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
                                    <option value="BANJAREJO BARAT">BANJAREJO BARAT</option>
                                    <option value="BANJAREJO TENGAH">BANJAREJO TENGAH</option>
                                    <option value="BANJAREJO TIMUR">BANJAREJO TIMUR</option>
                                    <option value="TAMBAKREJO">TAMBAKREJO</option>
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
                                    <option value="SUMBERAGUNG">SUMBERAGUNG</option>
                                    <option value="PONDOK JOYO">PONDOK JOYO</option>
                                    <option value="MUNDUREJO">MUNDUREJO</option>
                                </select>
                            </div>
                            <div class="col-1">
                                <label for="Jabatan" class="form-label">Wilayah</label>
                                <select class="form-select" id="Jabatan" name="Jabatan"
                                    aria-label="State">
                                    <option selected>001</option>
                                    <option value="002">002</option>
                                    <option value="003">003</option>
                                    <option value="004">004</option>
                                    <option value="005">005</option>
                                    <option value="006">006</option>
                                    <option value="007">007</option>
                                    <option value="008">008</option>
                                    <option value="009">009</option>
                                    <option value="010">010</option>
                                    <option value="011">011</option>
                                    <option value="012">012</option>
                                    <option value="013">013</option>
                                    <option value="014">014</option>
                                    <option value="015">015</option>
                                    <option value="016">016</option>
                                    <option value="017">017</option>
                                    <option value="018">018</option>
                                    <option value="019">019</option>
                                    <option value="020">020</option>
                                    <option value="021">021</option>
                                    <option value="REGASEN">REGASEN</option>
                                    <option value="HIPA">HIPA</option>
                                    <option value="KASUN">KASUN</option>
                                    <option value="SEKERTARIS DESA">SEKERTARIS DESA</option>
                                </select>
                            </div>
                            <div class="col-2">
                                <label for="Status" class="form-label">Status</label>
                                <select class="form-select" id="Status" name="Status"
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
