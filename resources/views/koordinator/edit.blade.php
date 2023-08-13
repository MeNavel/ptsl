@extends('mainlayout')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="container-fluid card">
                    @include('partials.css')
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
                                    <option value="ISLAM" @selected($data->agama == 'ISLAM')>ISLAM</option>
                                    <option value="KRISTEN" @selected($data->agama == "KRISTEN")>KRISTEN</option>
                                    <option value="KATOLIK" @selected($data->agama == "KATOLIK")>KATOLIK</option>
                                    <option value="HINDU" @selected($data->agama == "HINDU")>HINDU</option>
                                    <option value="BUDHA" @selected($data->agama == "BUDHA")>BUDHA</option>
                                    <option value="KONGHUCU" @selected($data->agama == "KONGHUCU")>KONGHUCU</option>
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
                                    <option value="PUCUAN" @selected($data->dusun == 'PUCUAN')>PUCUAN</option>
                                    <option value="ROWOTENGU" @selected($data->dusun == 'ROWOTENGU')>ROWOTENGU</option>
                                    <option value="BETENG" @selected($data->dusun == 'BETENG')>BETENG</option>
                                    <option value="BABATAN" @selected($data->dusun == 'BABATAN')>BABATAN</option>
                                    <option value="BESUKI" @selected($data->dusun == 'BESUKI')>BESUKI</option>
                                    <option value="SONGON" @selected($data->dusun == 'SONGON')>SONGON</option>
                                    <option value="PONDOK RAMPAL" @selected($data->dusun == 'PONDOK RAMPAL')>PONDOK RAMPAL</option>
                                    <option value="BLOGMUNDU" @selected($data->dusun == 'BLOGMUNDU')>BLOGMUNDU</option>
                                    <option value="SUKOMAKMUR" @selected($data->dusun == 'SUKOMAKMUR')>SUKOMAKMUR</option>
                                    <option value="TEMUREJO" @selected($data->dusun == 'TEMUREJO')>TEMUREJO</option>
                                    <option value="KRAJAN" @selected($data->dusun == 'KRAJAN')>KRAJAN</option>
                                    <option value="GUMUK KEMBAR" @selected($data->dusun == 'GUMUK KEMBAR')>GUMUK KEMBAR</option>
                                </select>
                            </div>
                            <div class="col-2">
                                <label for="Desa" class="form-label">Desa</label>
                                <select class="form-select" id="Desa" name="Desa" aria-label="State">
                                    <option value="SIDOMULYO" @selected($data->desa == 'SIDOMULYO')>SIDOMULYO</option>
                                    <option value="SIDOMEKAR" @selected($data->desa == 'SIDOMEKAR')>SIDOMEKAR</option>
                                    <option value="SUMBERAGUNG" @selected($data->desa == 'SUMBERAGUNG')>SUMBERAGUNG</option>
                                    <option value="PONDOK JOYO" @selected($data->desa == 'PONDOK JOYO')>PONDOK JOYO</option>
                                    <option value="MUNDUREJO" @selected($data->desa == 'MUNDUREJO')>MUNDUREJO</option>
                                    <option value="SIDOREJO" @selected($data->desa == 'SIDOREJO')>SIDOREJO</option>
                                </select>
                            </div>
                            <div class="col-1">
                                <label for="Jabatan" class="form-label">Wilayah</label>
                                <select class="form-select" id="Jabatan" name="Jabatan"
                                    aria-label="State">
                                    <option value="001" @selected($data->jabatan == "001")>001</option>
                                    <option value="002" @selected($data->jabatan == "002")>002</option>
                                    <option value="003" @selected($data->jabatan == "003")>003</option>
                                    <option value="004" @selected($data->jabatan == "004")>004</option>
                                    <option value="005" @selected($data->jabatan == "005")>005</option>
                                    <option value="006" @selected($data->jabatan == "006")>006</option>
                                    <option value="007" @selected($data->jabatan == "007")>007</option>
                                    <option value="008" @selected($data->jabatan == "008")>008</option>
                                    <option value="009" @selected($data->jabatan == "009")>009</option>
                                    <option value="010" @selected($data->jabatan == "010")>010</option>
                                    <option value="011" @selected($data->jabatan == "011")>011</option>
                                    <option value="012" @selected($data->jabatan == "012")>012</option>
                                    <option value="013" @selected($data->jabatan == "013")>013</option>
                                    <option value="014" @selected($data->jabatan == "014")>014</option>
                                    <option value="015" @selected($data->jabatan == "015")>015</option>
                                    <option value="016" @selected($data->jabatan == "016")>016</option>
                                    <option value="017" @selected($data->jabatan == "017")>017</option>
                                    <option value="018" @selected($data->jabatan == "018")>018</option>
                                    <option value="019" @selected($data->jabatan == "019")>019</option>
                                    <option value="020" @selected($data->jabatan == "020")>020</option>
                                    <option value="021" @selected($data->jabatan == "021")>021</option>
                                    <option value="REGASEN" @selected($data->jabatan == "REGASEN")>REGASEN</option>
                                    <option value="HIPA" @selected($data->jabatan == "HIPA")>HIPA</option>
                                    <option value="KASUN" @selected($data->jabatan == "KASUN")>KASUN</option>
                                    <option value="SEKERTARIS DESA" @selected($data->jabatan == "SEKERTARIS DESA")>SEKERTARIS DESA</option>
                                </select>
                            </div>
                            <div class="col-2">
                                <label for="Status" class="form-label">Status</label>
                                <select class="form-select" id="Status" name="Status"
                                    aria-label="State">
                                    <option value="SAKSI 1" @selected($data->status == "SAKSI 1")>SAKSI 1</option>
                                    <option value="SAKSI 2" @selected($data->status == "SAKSI 2")>SAKSI 2</option>
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
