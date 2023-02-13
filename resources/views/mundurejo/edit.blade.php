@extends('mainlayout')

@extends('layouts.navbar')

@section('content')
    <br>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="container card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Pendaftaran K1 Desa Mundurejo</h5>
                        <form action="/mundurejo">
                            <button type="submit" class="btn btn-primary">Home</button>
                        </form>
                        <br>
                        <!-- Data teknis tanah -->
                        <form action="/mundurejo/store" method="POST" class="row g-3">
                            @csrf
                            <div class="col-md-3">
                                <label for="No_Nominatif" class="form-label">Nomor Nominatif</label>
                                <input type="text" name="No_Nominatif" class="form-control" id="No_Nominatif" readonly
                                    value="{{ $data->id }}"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                            </div>
                            <div class="col-md-3">
                                <label for="Blok" class="form-label">Blok</label>
                                <input type="text" name="Blok" class="form-control" id="Blok"
                                    value="{{ $data->Blok }}"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                            </div>
                            <div class="col-md-3">
                                <label for="No_SPPT" class="form-label">No SPPT</label>
                                <input type="text" name="No_SPPT" class="form-control" id="No_SPPT"
                                    value="{{ $data->No_SPPT }}"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                            </div>
                            <div class="col-3">
                                <label for="PBT" class="form-label">PBT</label>
                                <input type="text" name="PBT" class="form-control" id="PBT"
                                    value="{{ $data->PBT }}">
                            </div>
                            <div class="col-3">
                                <label for="No_Berkas" class="form-label">No Berkas</label>
                                <input type="text" name="No_Berkas" class="form-control" id="No_Berkas"
                                    value="{{ $data->No_Berkas }}"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                            </div>
                            <div class="col-3">
                                <label for="NUB" class="form-label">NUB</label>
                                <input type="text" name="NUB" class="form-control" id="NUB"
                                    value="{{ $data->NUB }}"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                            </div>
                            <div class="col-3">
                                <label for="NIB" class="form-label">NIB</label>
                                <input type="text" name="NIB" class="form-control" id="NIB"
                                    value="{{ $data->NIB }}"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                            </div>
                            <div class="col-2">
                                <label for="Luas_Ukur" class="form-label">Luas Ukur</label>
                                <input type="number" name="Luas_Ukur" class="form-control" id="Luas_Ukur"
                                    value="{{ $data->Luas_Ukur }}" oninput=calculate()>
                            </div>

                            <div class="col-1">
                                <label for="Beda_Luas" class="form-label">Beda Luas</label>
                                <input type="text" name="Beda_Luas" class="form-control" id="Beda_Luas" readonly
                                    value="{{ $data->Selisih_Luas }}">
                            </div>

                            {{-- Data diri pemohon --}}
                            <div class="col-6">
                                <label for="No_KTP_NIK" class="form-label">NIK</label>
                                <input type="text" name="No_KTP_NIK" placeholder="Pemohon Pengajuan Sertifikat"
                                    value="{{ $data->No_KTP_NIK }}" class="form-control" id="No_KTP_NIK">
                            </div>
                            <div class="col-6">
                                <label for="Nama" class="form-label">Nama</label>
                                <input type="text" name="Nama" class="form-control" id="Nama"
                                    value="{{ $data->Nama }}">
                            </div>
                            <div class="col-2">
                                <label for="Tempat_Lahir" class="form-label">Tempat Lahir</label>
                                <input type="text" name="Tempat_Lahir" class="form-control" id="Tempat_Lahir"
                                    value="{{ $data->Tempat_Lahir }}">
                            </div>
                            <div class="col-2">
                                <label for="Tanggal_Lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" onchange="age()" name="Tanggal_Lahir" class="form-control"
                                    value="{{ $data->Tanggal_Lahir }}" id="Tanggal_Lahir">
                            </div>
                            <div class="col-1">
                                <label for="Usia" class="form-label">Usia</label>
                                <input type="text" name="Usia" class="form-control" id="Usia" readonly
                                    value="{{ $data->Usia }}">
                            </div>
                            <div class="col-3">
                                <label for="Alamat_Pemilik" class="form-label">Alamat Pemilik</label>
                                <input type="text" name="Alamat_Pemilik" class="form-control" id="Alamat_Pemilik"
                                    value="{{ $data->Alamat_Pemilik }}">
                            </div>
                            <div class="col-2">
                                <label for="Agama" class="form-label">Agama</label>
                                <select class="form-select" id="Agama" name="Agama" aria-label="State">
                                    <option selected>{{ $data->Agama }}</option>
                                    <option value="ISLAM">ISLAM</option>
                                    <option value="KRISTEN">KRISTEN</option>
                                    <option value="KATOLIK">KATOLIK</option>
                                    <option value="HINDU">HINDU</option>
                                    <option value="BUDHA">BUDHA</option>
                                    <option value="KONGHUCU">KONGHUCU</option>
                                </select>
                            </div>
                            <div class="col-2">
                                <label for="Pekerjaan" class="form-label">Pekerjaan</label>
                                <input type="text" name="Pekerjaan" class="form-control" id="Pekerjaan"
                                    value="{{ $data->Pekerjaan }}">
                            </div>

                            {{-- Data diri atas nama sertifikat --}}
                            <div class="col-6 an_sertifikat">
                                <label for="An_No_KTP_NIK" class="form-label">NIK</label>
                                <input type="text" name="An_No_KTP_NIK" placeholder="Atas Nama Sertifikat"
                                    value="{{ $data->An_No_KTP_NIK }}" class="form-control" id="An_No_KTP_NIK">
                            </div>
                            <div class="col-6 an_sertifikat">
                                <label for="An_Nama" class="form-label">Nama</label>
                                <input type="text" name="An_Nama" class="form-control" id="An_Nama"
                                    value="{{ $data->An_Nama }}">
                            </div>
                            <div class="col-2 an_sertifikat">
                                <label for="An_Tempat_Lahir" class="form-label">Tempat Lahir</label>
                                <input type="text" name="An_Tempat_Lahir" class="form-control" id="An_Tempat_Lahir"
                                    value="{{ $data->An_Tempat_Lahir }}">
                            </div>
                            <div class="col-2 an_sertifikat">
                                <label for="An_Tanggal_Lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" onchange="an_age()" name="An_Tanggal_Lahir" class="form-control"
                                    value="{{ $data->An_Tanggal_Lahir }}" id="An_Tanggal_Lahir">
                            </div>
                            <div class="col-1 an_sertifikat">
                                <label for="An_Usia" class="form-label">Usia</label>
                                <input type="text" name="An_Usia" class="form-control" id="An_Usia" readonly
                                    value="{{ $data->An_Usia }}">
                            </div>
                            <div class="col-7 an_sertifikat">
                                <label for="An_Alamat_Pemilik" class="form-label">Alamat Pemilik</label>
                                <input type="text" name="An_Alamat_Pemilik" class="form-control"
                                    value="{{ $data->An_Alamat_Pemilik }}" id="An_Alamat_Pemilik">
                            </div>

                            {{-- Data Tanah --}}
                            <div class="col-1">
                                <label for="RT_Letak_Tanah" class="form-label">RT</label>
                                <input type="text" name="RT_Letak_Tanah" class="form-control" id="RT_Letak_Tanah"
                                    value="{{ $data->RT_Letak_Tanah }}"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                            </div>
                            <div class="col-1">
                                <label for="RW_Letak_Tanah" class="form-label">RW</label>
                                <input type="text" name="RW_Letak_Tanah" class="form-control" id="RW_Letak_Tanah"
                                    value="{{ $data->RW_Letak_Tanah }}"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                            </div>
                            <div class="col-2">
                                <label for="Dusun_Letak_Tanah" class="form-label">Dusun</label>
                                <select class="form-select" id="Dusun_Letak_Tanah" name="Dusun_Letak_Tanah"
                                    aria-label="State">
                                    <option selected>{{ $data->Dusun_Letak_Tanah }}</option>
                                    <option value="TEMUREJO">TEMUREJO</option>
                                    <option value="SUKOMAKMUR">SUKOMAKMUR</option>
                                    <option value="BLOGMUNDU">BLOGMUNDU</option>
                                </select>
                            </div>
                            <div class="col-2">
                                <label for="No_C" class="form-label">Nomor C</label>
                                <input type="text" name="No_C" class="form-control" id="No_C"
                                    value="{{ $data->No_C }}">
                            </div>
                            <div class="col-2">
                                <label for="No_Persil" class="form-label">Nomor Persil</label>
                                <input type="text" name="No_Persil" class="form-control" id="No_Persil"
                                    value="{{ $data->No_Persil }}">
                            </div>
                            <div class="col-2">
                                <label for="Kelas" class="form-label">Kelas</label>
                                <input type="text" name="Kelas" class="form-control" id="Kelas"
                                    value="{{ $data->Kelas }}">
                            </div>
                            <div class="col-2">
                                <label for="Status_Tanah" class="form-label">Status Tanah</label>
                                <select class="form-select" id="Status_Tanah" name="Status_Tanah" aria-label="State">
                                    <option selected>{{ $data->Status_Tanah }}</option>
                                    <option value="YASAN">YASAN</option>
                                    <option value="NEGARA">NEGARA</option>
                                </select>
                            </div>
                            <div class="col-2">
                                <label for="Status_Penggunaan" class="form-label">Status Penggunaan</label>
                                <select class="form-select" id="Status_Penggunaan" name="Status_Penggunaan"
                                    aria-label="State">
                                    <option selected>{{ $data->Status_Penggunaan }}</option>
                                    <option value="PEKARANGAN">PEKARANGAN</option>
                                    <option value="RUMAH">RUMAH</option>
                                    <option value="SAWAH">SAWAH</option>
                                </select>
                            </div>
                            <div class="col-2">
                                <label for="Luas_Permohonan" class="form-label">Luas Permohonan</label>
                                <input oninput=calculate() type="number" name="Luas_Permohonan" class="form-control"
                                    value="{{ $data->Luas_Permohonan }}" id="Luas_Permohonan">
                            </div>
                            <div class="col-2">
                                <label for="Batas_Utara" class="form-label">Batas Utara</label>
                                <input type="text" name="Batas_Utara" class="form-control" id="Batas_Utara"
                                    value="{{ $data->Batas_Utara }}">
                            </div>
                            <div class="col-2">
                                <label for="Batas_Timur" class="form-label">Batas Timur</label>
                                <input type="text" name="Batas_Timur" class="form-control" id="Batas_Timur"
                                    value="{{ $data->Batas_Timur }}">
                            </div>
                            <div class="col-2">
                                <label for="Batas_Selatan" class="form-label">Batas Selatan</label>
                                <input type="text" name="Batas_Selatan" class="form-control" id="Batas_Selatan"
                                    value="{{ $data->Batas_Selatan }}">
                            </div>
                            <div class="col-2">
                                <label for="Batas_Barat" class="form-label">Batas Barat</label>
                                <input type="text" name="Batas_Barat" class="form-control" id="Batas_Barat"
                                    value="{{ $data->Batas_Barat }}">
                            </div>

                            {{-- Peralihan Kepemilikan --}}

                            <div class="col-2">
                                <label for="Tahun_Peralihan_1" class="form-label">Tahun 1</label>
                                <input type="text" name="Tahun_Peralihan_1" class="form-control"
                                    value="{{ $data->Tahun_Peralihan_1 }}" id="Tahun_Peralihan_1"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                            </div>
                            <div class="col-10">
                                <label for="Peralihan_1_Kepada" class="form-label">Nama 1</label>
                                <input type="text" name="Peralihan_1_Kepada" class="form-control"
                                    value="{{ $data->Peralihan_1_Kepada }}" id="Peralihan_1_Kepada">
                            </div>
                            <div class="col-2">
                                <label for="Tahun_Peralihan_2" class="form-label">Tahun 2</label>
                                <input type="text" name="Tahun_Peralihan_2" class="form-control"
                                    value="{{ $data->Tahun_Peralihan_2 }}" id="Tahun_Peralihan_2"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                            </div>
                            <div class="col-10">
                                <label for="Peralihan_2_Kepada" class="form-label">Nama 2</label>
                                <input type="text" name="Peralihan_2_Kepada" class="form-control"
                                    value="{{ $data->Peralihan_2_Kepada }}" id="Peralihan_2_Kepada">
                            </div>
                            <div class="col-2">
                                <label for="Sebab_Peralihan_2" class="form-label">Sebab Peralihan 2</label>
                                <select class="form-select" id="Sebab_Peralihan_2" name="Sebab_Peralihan_2"
                                    aria-label="State">
                                    <option selected>{{ $data->Sebab_Peralihan_2 }}</option>
                                    <option value=""></option>
                                    <option value="WARIS">WARIS</option>
                                    <option value="HIBAH">HIBAH</option>
                                    <option value="JUAL BELI">JUAL BELI</option>
                                </select>
                            </div>
                            <div class="col-10">
                                <label for="Dasar_Peralihan_2" class="form-label">Dasar Peralihan 2</label>
                                <input type="text" name="Dasar_Peralihan_2" class="form-control"
                                    value="{{ $data->Dasar_Peralihan_2 }}" id="Dasar_Peralihan_2">
                            </div>
                            <div class="col-2">
                                <label for="Tahun_Perolehan_Terakhir" class="form-label">Tahun 3</label>
                                <input type="text" name="Tahun_Perolehan_Terakhir" class="form-control"
                                    value="{{ $data->Tahun_Perolehan_Terakhir }}" id="Tahun_Perolehan_Terakhir"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                            </div>
                            <div class="col-2">
                                <label for="Sebab_Peralihan_Terakhir" class="form-label">Sebab Peralihan 3</label>
                                <select class="form-select" id="Sebab_Peralihan_Terakhir" name="Sebab_Peralihan_Terakhir"
                                    aria-label="State">
                                    <option selected>{{ $data->Sebab_Peralihan_Terakhir }}</option>
                                    <option value=""></option>
                                    <option value="WARIS">WARIS</option>
                                    <option value="HIBAH">HIBAH</option>
                                    <option value="JUAL BELI">JUAL BELI</option>
                                </select>
                            </div>
                            <div class="col-8">
                                <label for="Alas_Hak_Bukti_Perolehan" class="form-label">Dasar Peralihan 3</label>
                                <input type="text" name="Alas_Hak_Bukti_Perolehan" class="form-control"
                                    value="{{ $data->Alas_Hak_Bukti_Perolehan }}" id="Alas_Hak_Bukti_Perolehan">
                            </div>
                            <div class="col-10">
                                <label for="Koordinator" class="form-label">Koordinator</label>
                                <select class="form-select" id="Koordinator" name="Koordinator" aria-label="State">
                                    <option selected>{{ $data->Koordinator }}</option>
                                    <option value="001">01 - SOFYAN HADI</option>
                                    <option value="002">02 - ANDRI CAHYONO</option>
                                    <option value="003">03 - MUHADI</option>
                                    <option value="004">04 - SUTOPO</option>
                                    <option value="005">05 - EDI MESDIONO</option>
                                    <option value="006">06 - DENDI P</option>
                                    <option value="007">07 - ANDRIYONO</option>
                                    <option value="008">08 - SURADI</option>
                                    <option value="009">09 - MUKHOLIL</option>
                                    <option value="010">10 - DHEHAN</option>
                                    <option value="011">11 - SANTOSO</option>
                                    <option value="012">12 - H. BUKHORI</option>
                                    <option value="013">13 - H. MUHSIN</option>
                                    <option value="014">14 - MOH. AMIN</option>
                                </select>
                            </div>

                            <div class="col-2">
                                <label for="Tgl_Pendataan" class="form-label">Tanggal Pendataan</label>
                                <input type="date" name="Tgl_Pendataan" class="form-control"
                                value="{{ $data->Tgl_Pendataan }}" id="Tgl_Pendataan">
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
