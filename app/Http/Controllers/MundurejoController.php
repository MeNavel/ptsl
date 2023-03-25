<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Mundurejo;
use App\Models\Koordinator;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class MundurejoController extends Controller
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
            $data = Mundurejo::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return '<div class="btn-group">
                                <a class="btn btn-info" href="' . route('edit-mundurejo', $row->id) . '" role="button"><i class="bi bi-info-circle"></i></a>
                                <a class="btn btn-primary" href="' . route('export-mundurejo', $row->id) . '" role="button"><i class="bi bi-file-earmark-word"></i></a>
                                <button class="btn btn-danger delete-btn" data-id="' . $row->id . '"><i class="bi-trash3"></i></button>
                            </div>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('mundurejo.index');
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
        return view('mundurejo.create');
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

        $desa = "MUNDUREJO";
        $kecamatan = "UMBULSARI";
        $kades = "EDI SANTOSO";

        $data = Mundurejo::find($request->No_Nominatif);
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



        $data = new Mundurejo;

        $data->id = $request->No_Nominatif;
        $data->Blok = $request->Blok;
        $data->No_SPPT = $request->No_SPPT;
        $data->Tgl_Pendataan = $request->Tgl_Pendataan;
        $data->PBT = $request->PBT;
        $data->No_Berkas = $request->No_Berkas;
        $data->NUB = $request->NUB;
        $data->NIB = $request->NIB;
        $data->Luas_Ukur = $request->Luas_Ukur;
        $data->Beda_Luas = abs($luas_1 - $luas_2);
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
        if ($request->Alas_Hak_Bukti_Perolehan == "" && $request->Dasar_Peralihan_2 != "") {
            $data->Peralihan_2_Kepada = $data->An_Nama;
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
        $data->Tahun_Perolehan_Terakhir = $request->Tahun_Perolehan_Terakhir;
        $data->Sebab_Peralihan_Terakhir = $request->Sebab_Peralihan_Terakhir;
        if ($request->Dasar_Peralihan_2 != null && $request->Alas_Hak_Bukti_Perolehan != null){
            $data->Nama_Perolehan_Terakhir = $data->An_Nama;
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
        

        $data_saksi_1 = Koordinator::where([
            ['jabatan', '=', $request->Koordinator],
            ['dusun', '=', $request->Dusun_Letak_Tanah],
            ['desa', '=', $desa],
            ['status', '=', 'SAKSI 1'],
        ])->first();
        if ($data_saksi_1 != null) {
            $data->Koordinator = $data_saksi_1->jabatan;
            $data->Nama_Saksi_1 = $data_saksi_1->nama;
            $data->NIK_Saksi_1 = $data_saksi_1->nik;
            $data->Agama_Saksi_1 = $data_saksi_1->agama;
            $data->Usia_Saksi_1 = $data_saksi_1->usia;
            $data->Pekerjaan_Saksi_1 =  $data_saksi_1->pekerjaan;
            $data->Alamat_Saksi_1 = $data_saksi_1->alamat;
            $data_saksi_2 = Koordinator::where([
                ['dusun', '=', $request->Dusun_Letak_Tanah],
                ['desa', '=', $desa],
                ['status', '=', 'SAKSI 2'],
            ])->first();
            if ($data_saksi_2 != null) {
                $data->Nama_Saksi_2 = $data_saksi_2->nama;
                $data->NIK_Saksi_2 = $data_saksi_2->nik;
                $data->Agama_Saksi_2 = $data_saksi_2->agama;
                $data->Usia_Saksi_2 = $data_saksi_2->usia;
                $data->Pekerjaan_Saksi_2 =  $data_saksi_2->pekerjaan;
                $data->Alamat_Saksi_2 = $data_saksi_2->alamat;
            }
        }
        $data->save();
        return view('mundurejo.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\K1  $k1
     * @return \Illuminate\Http\Response
     */
    public function show(Mundurejo $k1)
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
        $data = Mundurejo::find($No_Nominatif);
        return view('mundurejo.edit', compact(['data']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\K1  $k1
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mundurejo $k1)
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
        $data = Mundurejo::find($No_Nominatif);
        if ($data) {
            $data->delete();
            return response()->json(['success' => 'Data Deleted Successfully']);
        };
    }

    public function cek_nominatif(Request $request)
    { {
            if ($request->get('No_Nominatif')) {
                $No_Nominatif = $request->get('No_Nominatif');
                $data = Mundurejo::find($No_Nominatif);
                if ($data) {
                    echo 'not_unique';
                } else {
                    echo 'unique';
                }
            }
        }
    }
}
