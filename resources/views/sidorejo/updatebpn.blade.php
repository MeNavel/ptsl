@extends('mainlayout')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="container-fluid card">
                    @include('partials.css')
                    <div class="card-body">
                        <h5 class="card-title">Update Data BPN K1 Desa Sidorejo</h5>
                        <form action="{{ route('sidorejo.index') }}">
                            <button type="submit" class="btn btn-primary">Home</button>
                        </form>
                        <br>
                        <!-- Data teknis tanah -->
                        <form action="{{ route('updatebpn_sidorejo') }}" method="POST" class="row g-3">
                            @csrf
                            <div class="col-md-2">
                                <label for="No_Nominatif" class="form-label">Nomor Nominatif</label>
                                <input type="text" name="No_Nominatif" class="form-control" id="No_Nominatif" autofocus>
                            </div>
                            <div class="col-2">
                                <label for="NIB" class="form-label">NIB</label>
                                <input type="text" name="NIB" class="form-control" id="NIB"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                <span id="cek_nib"></span>
                            </div>
                            <div class="col-2">
                                <label for="Luas_Ukur" class="form-label">Luas Ukur</label>
                                <input type="number" name="Luas_Ukur" class="form-control" id="Luas_Ukur"
                                    oninput=calculate()>
                            </div>
                            <div class="col-2">
                                <label for="PBT" class="form-label">PBT</label>
                                <input type="text" name="PBT" class="form-control" id="PBT">
                            </div>
                            <div class="col-2">
                                <label for="Luas_Permohonan" class="form-label">Luas Permohonan</label>
                                <input oninput=calculate() type="number" name="Luas_Permohonan" class="form-control"
                                    id="Luas_Permohonan">
                            </div>
                            <div class="col-2">
                                <label for="NUB" class="form-label">Nomor Pengumuman</label>
                                <input type="text" name="NUB" class="form-control" id="NUB"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                            </div>

                            <div class="col-3">
                                <label for="Batas_Utara" class="form-label">Batas Utara</label>
                                <input type="text" name="Batas_Utara" class="form-control" id="Batas_Utara">
                            </div>
                            <div class="col-3">
                                <label for="Batas_Timur" class="form-label">Batas Timur</label>
                                <input type="text" name="Batas_Timur" class="form-control" id="Batas_Timur">
                            </div>
                            <div class="col-3">
                                <label for="Batas_Selatan" class="form-label">Batas Selatan</label>
                                <input type="text" name="Batas_Selatan" class="form-control" id="Batas_Selatan">
                            </div>
                            <div class="col-3">
                                <label for="Batas_Barat" class="form-label">Batas Barat</label>
                                <input type="text" name="Batas_Barat" class="form-control" id="Batas_Barat">
                            </div>



                            <div class="col-2">
                                <label for="No_Berkas" class="form-label">No Berkas</label>
                                <input type="text" name="No_Berkas" class="form-control" id="No_Berkas"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                            </div>
                            <div class="col-1">
                                <label for="Beda_Luas" class="form-label">Beda Luas</label>
                                <input type="text" name="Beda_Luas" class="form-control" id="Beda_Luas" readonly>
                            </div>

                            {{-- Data diri atas nama sertifikat --}}
                            <div class="col-9 an_sertifikat">
                                <label for="An_Nama" class="form-label">Nama</label>
                                <input type="text" name="An_Nama" class="form-control" id="An_Nama" readonly>
                            </div>


                            <div class="text-center">
                                <button id="submit" type="submit" class="btn btn-primary">Submit</button>
                                <button id="reset" type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </form><!-- End Multi Columns Form -->
                        <script>
                            $(document).ready(function() {
                                $('#No_Nominatif').blur(function() {
                                    $('#submit').attr('disabled', true);

                                    var No_Nominatif = $('#No_Nominatif').val();
                                    var _token = $('input[name="_token"]').val();

                                    $.ajax({
                                        url: "{{ route('cek-sidorejo') }}",
                                        method: "POST",
                                        data: {
                                            No_Nominatif: No_Nominatif,
                                            _token: _token
                                        },
                                        success: function(data) {
                                            if (data.success == true) {
                                                $('#NIB').val(data.data.NIB);
                                                $('#Luas_Ukur').val(data.data.Luas_Ukur);
                                                $('#PBT').val(data.data.PBT);
                                                $('#Luas_Permohonan').val(data.data.Luas_Permohonan);
                                                $("#NUB").val(data.data.NUB);
                                                $('#Batas_Utara').val(data.data.Batas_Utara);
                                                $('#Batas_Timur').val(data.data.Batas_Timur);
                                                $('#Batas_Selatan').val(data.data.Batas_Selatan);
                                                $('#Batas_Barat').val(data.data.Batas_Barat);
                                                $('#No_Berkas').val(data.data.No_Berkas);
                                                $('#Beda_Luas').val(data.data.Selisih_Luas);
                                                $('#An_Nama').val(data.data.An_Nama);
                                                $('#submit').attr('disabled', false);
                                            } else {
                                                $('#NIB').val("");
                                                $('#Luas_Ukur').val("");
                                                $('#PBT').val("");
                                                $('#Luas_Permohonan').val("");
                                                $("#NUB").val("");
                                                $('#Batas_Utara').val("");
                                                $('#Batas_Timur').val("");
                                                $('#Batas_Selatan').val("");
                                                $('#Batas_Barat').val("");
                                                $('#No_Berkas').val("");
                                                $('#Beda_Luas').val("");
                                                $('#An_Nama').val("");
                                                $('#submit').attr('disabled', true);
                                            }
                                        },
                                    })
                                });
                                $('#NIB').blur(function() {
                                    var No_NIB = $('#NIB').val();
                                    var _token = $('input[name="_token"]').val();

                                    var filter = /\b\d{5}\b/;
                                    if (!filter.test(No_NIB)) {
                                        $('#cek_nib').show();
                                        $('#cek_nib').html(
                                            '<label class="text-danger">Nomor NIB Harus 5 Angka</label>');
                                        $('#submit').attr('disabled', true);
                                    } else {
                                        $('#cek_nib').hide();
                                        $('#submit').attr('disabled', false);
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
