@extends('mainlayout')

@section('content')
    <br>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="container card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Data Koordinator</h5>
                        <form action="/koordinator">
                            <button type="submit" class="btn btn-primary">Home</button>
                        </form>
                        <br>
                        <!-- Data teknis tanah -->
                        <form action="{{ route('update-koordinator', $data->id) }}" method="POST" class="row g-3">
                            @csrf
                            {{-- Data diri pemohon --}}
                            <div class="col-2">
                                <label for="NIK" class="form-label">NIK</label>
                                <input type="text" name="NIK" placeholder="Pemohon Pengajuan Sertifikat"
                                    value="{{ $data->nik }}" class="form-control" id="NIK" readonly>
                            </div>
                            <div class="col-4">
                                <label for="Nama" class="form-label">Nama</label>
                                <input type="text" name="Nama" class="form-control" id="Nama"
                                    value="{{ $data->nama }}">
                            </div>
                            <div class="col-2">
                                <label for="Agama" class="form-label">Agama</label>
                                <select class="form-select" id="Agama" name="Agama" aria-label="State">
                                    <option selected>{{ $data->agama }}</option>
                                    <option value="ISLAM">ISLAM</option>
                                    <option value="KRISTEN">KRISTEN</option>
                                    <option value="KATOLIK">KATOLIK</option>
                                    <option value="HINDU">HINDU</option>
                                    <option value="BUDHA">BUDHA</option>
                                    <option value="KONGHUCU">KONGHUCU</option>
                                </select>
                            </div>
                            <div class="col-1 an_sertifikat">
                                <label for="Usia" class="form-label">Usia</label>
                                <input type="text" name="Usia" class="form-control" id="Usia"
                                    value="{{ $data->usia }}">
                            </div>
                            <div class="col-3">
                                <label for="Pekerjaan" class="form-label">Pekerjaan</label>
                                <input type="text" name="Pekerjaan" class="form-control" id="Pekerjaan"
                                    value="{{ $data->pekerjaan }}">
                            </div>
                            <div class="col-5">
                                <label for="Alamat" class="form-label">Alamat</label>
                                <input type="text" name="Alamat" class="form-control" id="Alamat"
                                    value="{{ $data->alamat }}">
                            </div>
                            <div class="col-2">
                                <label for="Dusun" class="form-label">Dusun</label>
                                <select class="form-select" id="Dusun" name="Dusun" aria-label="State">
                                    <option selected>{{ $data->dusun }}</option>
                                    <option value="BETENG">BETENG</option>
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
                                <select class="form-select" id="Desa" name="Desa" aria-label="State">
                                    <option selected>{{ $data->desa }}</option>
                                    <option value="SIDOMEKAR">SIDOMEKAR</option>
                                    <option value="SUMBERAGUNG">SUMBERAGUNG</option>
                                    <option value="PONDOK JOYO">PONDOK JOYO</option>
                                    <option value="MUNDUREJO">MUNDUREJO</option>
                                </select>
                            </div>
                            <div class="col-1">
                                <label for="Jabatan" class="form-label">Wilayah</label>
                                <select class="form-select" id="Jabatan" name="Jabatan"
                                    aria-label="State">
                                    <option selected>{{ $data->jabatan }}</option>
                                    <option value="001">001</option>
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
                                    <option selected>{{ $data->status }}</option>
                                    <option value="SAKSI 1">SAKSI 1</option>
                                    <option value="SAKSI 2">SAKSI 2</option>
                                </select>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form><!-- End Multi Columns Form -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
