<?php

namespace App\Http\Controllers;

use App\Models\Sidomekar;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class SidomekarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = Sidomekar::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return '<div class="btn-group">
                                <a class="btn btn-info" href="' . route('edit-sidomekar', $row->id) . '" role="button"><i class="bi bi-info-circle"></i></a>
                                <a class="btn btn-primary" href="' . route('export-sidomekar', $row->id) . '" role="button"><i class="bi bi-file-earmark-word"></i></a>
                                <button class="btn btn-danger delete-btn" data-id="' . $row->id . '"><i class="bi-trash3"></i></button>
                            </div>';;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('sidomekar.index');
        // $k1 = K1::all();
        // return view('k1.new', compact(['k1']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sidomekar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // DB::table('k1')->insert([
        //     'email' => 'kayla@example.com',
        //     'votes' => 0
        // ]);

        $desa = "SIDOMEKAR";
        $kecamatan = "SEMBORO";
        $kades = "EDI SANTOSO";

        $Nama_Saksi_2 = "BUDIONO";
        $NIK_Saksi_2 = "3509071011790003";
        $Agama_Saksi_2 = "ISLAM";
        $Usia_Saksi_2 = "43";
        $Pekerjaan_Saksi_2 = "WIRASWASTA";
        $Alamat_Saksi_2 = "DUSUN BETENG RT 002 RW 008 DESA SIDOMEKAR KECAMATAN SEMBORO";

        if ($request->Koordinator == "SLAMET") {
            $Nama_Saksi_1 = "SLAMET";
            $NIK_Saksi_1 = "3509070902670003";
            $Agama_Saksi_1 = "ISLAM";
            $Usia_Saksi_1 = "55";
            $Pekerjaan_Saksi_1 = "PERANGKAT DESA";
            $Alamat_Saksi_1 = "DUSUN BETENG RT 004 RW 004 DESA SIDOMEKAR KECAMATAN SEMBORO";
        } else if ($request->Koordinator == "MISDARI") {
            $Nama_Saksi_1 = "MISDARI";
            $NIK_Saksi_1 = "3509071505630001";
            $Agama_Saksi_1 = "ISLAM";
            $Usia_Saksi_1 = "60";
            $Pekerjaan_Saksi_1 = "PERANGKAT DESA";
            $Alamat_Saksi_1 = "DUSUN BABATAN RT 002 RW 016 DESA SIDOMEKAR KECAMATAN SEMBORO";
        } else if ($request->Koordinator == "SAIFUL BAHRI") {
            $Nama_Saksi_1 = "SAIFUL BAHRI";
            $NIK_Saksi_1 = "3509072009640001";
            $Agama_Saksi_1 = "ISLAM";
            $Usia_Saksi_1 = "58";
            $Pekerjaan_Saksi_1 = "PERANGKAT DESA";
            $Alamat_Saksi_1 = "DUSUN BESUKI RT 001 RW 0027 DESA SIDOMEKAR KECAMATAN SEMBORO";
        }


        $data = Sidomekar::find($request->No_Nominatif);
        if ($data) {
            $data->delete();
        }

        $luas_1 = $request->Luas_Ukur;
        $luas_2 = $request->Luas_Permohonan;
        if ($request->Luas_Ukur == "") {
            $luas_1 = 0;
        } else if ($request->Luas_Permohonan == "") {
            $luas_2 = 0;
        }

        $data = new Sidomekar;

        $data->id = $request->No_Nominatif;
        $data->Blok = $request->Blok;
        $data->No_SPPT = $request->No_SPPT;
        $data->Tgl_Pendataan = $request->Tgl_Pendataan;
        $data->PBT = $request->PBT;
        $data->No_Berkas = $request->No_Berkas;
        $data->NUB = $request->NUB;
        $data->NIB = $request->NIB;
        $data->Luas_Ukur = $request->Luas_Ukur;
        $data->Beda_Luas = $luas_1 - $luas_2;
        $data->Selisih_Luas = $request->Beda_Luas;

        // Data Pemohon Sertifikat
        $data->No_KTP_NIK = $request->No_KTP_NIK;
        $data->Nama = $request->Nama;
        $data->Tempat_Lahir = $request->Tempat_Lahir;
        $data->Tanggal_Lahir = $request->Tanggal_Lahir;
        $data->Usia = $request->Usia;
        $data->Alamat_Pemilik = $request->Alamat_Pemilik;
        $data->Agama = $request->Agama;
        $data->Pekerjaan = $request->Pekerjaan;

        // Data Atas Nama Sertifikat
        if ($request->An_No_KTP_NIK == "") {
            $data->An_No_KTP_NIK = $request->No_KTP_NIK;
            $data->An_Nama = $request->Nama;
            $data->An_Tempat_Lahir = $request->Tempat_Lahir;
            $data->An_Tanggal_Lahir  = $request->Tanggal_Lahir;
            $data->An_Usia = $request->Usia;
            $data->An_Alamat_Pemilik = $request->Alamat_Pemilik;
        } else {
            $data->An_No_KTP_NIK = $request->An_No_KTP_NIK;
            $data->An_Nama = $request->An_Nama;
            $data->An_Tempat_Lahir = $request->An_Tempat_Lahir;
            $data->An_Tanggal_Lahir  = $request->An_Tanggal_Lahir;
            $data->An_Usia = $request->An_Usia;
            $data->An_Alamat_Pemilik = $request->An_Alamat_Pemilik;
        }

        // Data Tanah
        $data->RT_Letak_Tanah = $request->RT_Letak_Tanah;
        $data->RW_Letak_Tanah = $request->RW_Letak_Tanah;
        $data->Dusun_Letak_Tanah = $request->Dusun_Letak_Tanah;
        $data->Desa_Letak_Tanah = $desa;
        $data->Kec_Letak_Tanah = $kecamatan;
        $data->Tahun_C = $request->Tahun_Peralihan_1;
        $data->No_C = $request->No_C;
        $data->No_Persil = $request->No_Persil;
        $data->Kelas = $request->Kelas;
        $data->Status_Tanah = $request->Status_Tanah;
        $data->Status_Penggunaan = $request->Status_Penggunaan;
        $data->Luas_Permohonan = $request->Luas_Permohonan;
        $data->Batas_Utara = $request->Batas_Utara;
        $data->Batas_Timur = $request->Batas_Timur;
        $data->Batas_Selatan = $request->Batas_Selatan;
        $data->Batas_Barat = $request->Batas_Barat;

        // Peralihan Kepemilikan
        // Peralihan 1
        $data->Tahun_Peralihan_1 = $request->Tahun_Peralihan_1;
        if ($request->Peralihan_1_Kepada == "") {
            $data->Peralihan_1_Kepada = $request->Nama;
        } else {
            $data->Peralihan_1_Kepada = $request->Peralihan_1_Kepada;
        }

        // Peralihan 2
        $data->Tahun_Peralihan_2 = $request->Tahun_Peralihan_2;
        if ($request->Peralihan_2_Kepada == "" && $request->Peralihan_1_Kepada != "") {
            $data->Peralihan_2_Kepada = $request->Nama;
        } else {
            $data->Peralihan_2_Kepada = $request->Peralihan_2_Kepada;
        }
        $data->Sebab_Peralihan_2 = $request->Sebab_Peralihan_2;
        $data->Dasar_Peralihan_2 = $request->Dasar_Peralihan_2;

        //Pemilik Sebelumnya
        if ($request->Alas_Hak_Bukti_Perolehan == "") {
            if ($request->Dasar_Peralihan_2 == "") {
                $data->Pemilik_Sebelumnya = null;
            } else {
                $data->Pemilik_Sebelumnya = $request->Peralihan_1_Kepada;
            }
        } else {
            $data->Pemilik_Sebelumnya = $request->Peralihan_2_Kepada;
        }

        //Peralihan 3
        if ($request->Tahun_Perolehan_Terakhir != "") {
            $data->Tahun_Perolehan_Terakhir = $request->Tahun_Perolehan_Terakhir;
        } else if ($request->Tahun_Perolehan_Terakhir == "" && $request->Tahun_Peralihan_2 != "") {
            $data->Tahun_Perolehan_Terakhir = $request->Tahun_Peralihan_2;
        }

        $data->Sebab_Peralihan_Terakhir = $request->Sebab_Peralihan_Terakhir;
        if ($request->Nama_Perolehan_Terakhir == "" && $request->Peralihan_2_Kepada != "") {
            if ($data->No_KTP_NIK == $data->An_No_KTP_NIK) {
                $data->Nama_Perolehan_Terakhir = $request->Nama;
            } else {
                $data->Nama_Perolehan_Terakhir = $request->An_Nama;
            }
        } else {
            $data->Nama_Perolehan_Terakhir = $request->Nama_Perolehan_Terakhir;
        }

        // Pemberi Waris
        if ($request->Sebab_Peralihan_Terakhir == "WARIS") {
            $data->Pemberi_Waris = $request->Peralihan_2_Kepada;
        } else if ($request->Sebab_Peralihan_2 == "WARIS" && $request->Sebab_Peralihan_Terakhir == "") {
            $data->Pemberi_Waris = $request->Peralihan_1_Kepada;
        }

        $data->Tahun_Meninggal = $request->Tahun_Meninggal;

        // Peralihan Terakhir
        if ($request->Sebab_Peralihan_Terakhir == "WARIS") {
            $data->Bukti_Waris = $request->Alas_Hak_Bukti_Perolehan;
        } else if ($request->Sebab_Peralihan_Terakhir == "JUAL BELI") {
            $data->Bukti_Jual_Beli = $request->Alas_Hak_Bukti_Perolehan;
        } else if ($request->Sebab_Peralihan_Terakhir == "HIBAH") {
            $data->Bukti_Hibah = $request->Alas_Hak_Bukti_Perolehan;
        }

        // Peralihan Kedua
        else if ($request->Sebab_Peralihan_2 == "WARIS") {
            $data->Bukti_Waris = $request->Dasar_Peralihan_2;
        } else if ($request->Sebab_Peralihan_2 == "JUAL BELI") {
            $data->Bukti_Jual_Beli = $request->Dasar_Peralihan_2;
        } else if ($request->Sebab_Peralihan_2 == "HIBAH") {
            $data->Bukti_Hibah = $request->Dasar_Peralihan_2;
        }

        $data->Alas_Hak_Bukti_Perolehan = $request->Alas_Hak_Bukti_Perolehan;
        $data->Nama_Kades = $kades;

        $data->Nama_Saksi_1 = $Nama_Saksi_1;
        $data->NIK_Saksi_1 = $NIK_Saksi_1;
        $data->Agama_Saksi_1 = $Agama_Saksi_1;
        $data->Usia_Saksi_1 = $Usia_Saksi_1;
        $data->Pekerjaan_Saksi_1 =  $Pekerjaan_Saksi_1;
        $data->Alamat_Saksi_1 = $Alamat_Saksi_1;

        $data->Nama_Saksi_2 = $Nama_Saksi_2;
        $data->NIK_Saksi_2 = $NIK_Saksi_2;
        $data->Agama_Saksi_2 = $Agama_Saksi_2;
        $data->Usia_Saksi_2 = $Usia_Saksi_2;
        $data->Pekerjaan_Saksi_2 =  $Pekerjaan_Saksi_2;
        $data->Alamat_Saksi_2 = $Alamat_Saksi_2;

        $data->Koordinator = $request->Koordinator;
        $data->save();
        return view('sidomekar.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\K1  $k1
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\K1  $k1
     * @return \Illuminate\Http\Response
     */
    public function edit($No_Nominatif)
    {
        $data = Sidomekar::find($No_Nominatif);
        return view('sidomekar.edit', compact(['data']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\K1  $k1
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\K1  $k1
     * @return \Illuminate\Http\Response
     */
    public function destroy($No_Nominatif)
    {
        $data = Sidomekar::find($No_Nominatif);
        if ($data) {
            $data->delete();
            return response()->json(['success' => 'Data Deleted Successfully']);
        };
    }

    public function cek_nominatif(Request $request)
    { {
            if ($request->get('No_Nominatif')) {
                $No_Nominatif = $request->get('No_Nominatif');
                $data = Sidomekar::find($No_Nominatif);
                if ($data) {
                    echo 'not_unique';
                } else {
                    echo 'unique';
                }
            }
        }
    }
}