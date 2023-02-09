<?php

namespace App\Http\Controllers;

use App\Models\Mundurejo;
use App\Models\Pondokjoyo;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class DownloadController extends Controller
{

    public function downloadExcelPondokjoyo()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Ambil data dari database
        $data = Pondokjoyo::select('*')->get();

        // Tulis header kolom pada file excel
        $sheet->setCellValue('A1', 'No Nominatif');
        $sheet->setCellValue('B1', 'Blok');
        $sheet->setCellValue('C1', 'No SPPT');
        $sheet->setCellValue('D1', 'No Pengumuman');
        $sheet->setCellValue('E1', 'Sudah Pengumuman');
        $sheet->setCellValue('F1', 'Tanggal Pendataan');
        $sheet->setCellValue('G1', 'PBT');
        $sheet->setCellValue('H1', 'No Berkas');
        $sheet->setCellValue('I1', 'NUB');
        $sheet->setCellValue('J1', 'NIB');
        $sheet->setCellValue('K1', 'Luas Ukur');
        $sheet->setCellValue('L1', 'Beda Luas');
        $sheet->setCellValue('M1', 'Selisih Luas');
        $sheet->setCellValue('N1', 'No KTP NIK');
        $sheet->setCellValue('O1', 'Nama');
        $sheet->setCellValue('P1', 'Tempat Lahir');
        $sheet->setCellValue('Q1', 'Tanggal Lahir');
        $sheet->setCellValue('R1', 'Usia');
        $sheet->setCellValue('S1', 'Alamat Pemilik');
        $sheet->setCellValue('T1', 'Agama');
        $sheet->setCellValue('U1', 'Pekerjaan');
        $sheet->setCellValue('V1', 'An No KTP NIK');
        $sheet->setCellValue('W1', 'An Nama');
        $sheet->setCellValue('X1', 'An Tempat Lahir');
        $sheet->setCellValue('Y1', 'An Tanggal Lahir');
        $sheet->setCellValue('Z1', 'An Usia');
        $sheet->setCellValue('AA1', 'An Alamat Pemilik');
        $sheet->setCellValue('AB1', 'RT Letak Tanah');
        $sheet->setCellValue('AC1', 'RW Letak Tanah');
        $sheet->setCellValue('AD1', 'Dusun Letak Tanah');
        $sheet->setCellValue('AE1', 'Desa Letak Tanah');
        $sheet->setCellValue('AF1', 'Kec Letak Tanah');
        $sheet->setCellValue('AG1', 'Tahun C');
        $sheet->setCellValue('AH1', 'No C');
        $sheet->setCellValue('AI1', 'No Persil');
        $sheet->setCellValue('AJ1', 'Kelas');
        $sheet->setCellValue('AK1', 'Status Tanah');
        $sheet->setCellValue('AL1', 'Status Penggunaan');
        $sheet->setCellValue('AM1', 'Luas Permohonan');
        $sheet->setCellValue('AN1', 'Batas Utara');
        $sheet->setCellValue('AO1', 'Batas Timur');
        $sheet->setCellValue('AP1', 'Batas Selatan');
        $sheet->setCellValue('AQ1', 'Batas Barat');
        $sheet->setCellValue('AR1', 'Tahun Peralihan 1');
        $sheet->setCellValue('AS1', 'Peralihan 1 Kepada');
        $sheet->setCellValue('AT1', 'Tahun Peralihan 2');
        $sheet->setCellValue('AU1', 'Peralihan 2 Kepada');
        $sheet->setCellValue('AV1', 'Sebab Peralihan 2');
        $sheet->setCellValue('AW1', 'Dasar Peralihan 2');
        $sheet->setCellValue('AX1', 'Pemilik Sebelumnya');
        $sheet->setCellValue('AY1', 'Tahun Perolehan Terakhir');
        $sheet->setCellValue('AZ1', 'Sebab Peralihan Terkahir');
        $sheet->setCellValue('BA1', 'Nama Perolehan Terakhir');
        $sheet->setCellValue('BB1', 'Pemberi Waris');
        $sheet->setCellValue('BC1', 'Tahun Meninggal');
        $sheet->setCellValue('BD1', 'Bukti Waris');
        $sheet->setCellValue('BE1', 'Bukti Jual Beli');
        $sheet->setCellValue('BF1', 'Bukti Hibah');
        $sheet->setCellValue('BG1', 'Alas Hak Bukti Perolehan');
        $sheet->setCellValue('BH1', 'Nama Kades');
        $sheet->setCellValue('BI1', 'Nama Saksi 1');
        $sheet->setCellValue('BJ1', 'NIK Saksi 1');
        $sheet->setCellValue('BK1', 'Agama Saksi 1');
        $sheet->setCellValue('BL1', 'Usia Saksi 1');
        $sheet->setCellValue('BM1', 'Pekerjaan Saksi 1');
        $sheet->setCellValue('BN1', 'Alamat Saksi 1');
        $sheet->setCellValue('BO1', 'Nama Saksi 2');
        $sheet->setCellValue('BP1', 'NIK Saksi 2');
        $sheet->setCellValue('BQ1', 'Agama Saksi 2');
        $sheet->setCellValue('BR1', 'Usia Saksi 2');
        $sheet->setCellValue('BS1', 'Pekerjaan Saksi 2');
        $sheet->setCellValue('BT1', 'Alamat Saksi 2');
        $sheet->setCellValue('BU1', 'Koordinator');

        // Tulis data pada file excel
        $row = 2;
        foreach ($data as $item) {
            $sheet->setCellValue('A' . $row, $item->id);
            $sheet->setCellValue('B' . $row, $item->Blok);
            $sheet->setCellValue('C' . $row, $item->No_SPPT);
            $sheet->setCellValue('D' . $row, $item->No_Pengumuman);
            $sheet->setCellValue('E' . $row, $item->Sudah_Pengumuman);
            $sheet->setCellValue('F' . $row, $item->Tgl_Pendataan);
            $sheet->setCellValue('G' . $row, $item->PBT);
            $sheet->setCellValue('H' . $row, $item->No_Berkas);
            $sheet->setCellValue('I' . $row, $item->NUB);
            $sheet->setCellValue('J' . $row, $item->NIB);
            $sheet->setCellValue('K' . $row, $item->Luas_Ukur);
            $sheet->setCellValue('L' . $row, $item->Beda_Luas);
            $sheet->setCellValue('M' . $row, $item->Selisih_Luas);
            $sheet->setCellValueExplicit('N' . $row, $item->No_KTP_NIK, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
            $sheet->setCellValue('O' . $row, $item->Nama);
            $sheet->setCellValue('P' . $row, $item->Tempat_Lahir);
            $sheet->setCellValue('Q' . $row, $item->Tanggal_Lahir);
            $sheet->setCellValue('R' . $row, $item->Usia);
            $sheet->setCellValue('S' . $row, $item->Alamat_Pemilik);
            $sheet->setCellValue('T' . $row, $item->Agama);
            $sheet->setCellValue('U' . $row, $item->Pekerjaan);
            $sheet->setCellValueExplicit('V' . $row, $item->An_No_KTP_NIK, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
            $sheet->setCellValue('W' . $row, $item->An_Nama);
            $sheet->setCellValue('X' . $row, $item->An_Tempat_Lahir);
            $sheet->setCellValue('Y' . $row, $item->An_Tanggal_Lahir);
            $sheet->setCellValue('Z' . $row, $item->An_Usia);
            $sheet->setCellValue('AA' . $row, $item->An_Alamat_Pemilik);
            $sheet->setCellValue('AB' . $row, $item->RT_Letak_Tanah);
            $sheet->setCellValue('AC' . $row, $item->RW_Letak_Tanah);
            $sheet->setCellValue('AD' . $row, $item->Dusun_Letak_Tanah);
            $sheet->setCellValue('AE' . $row, $item->Desa_Letak_Tanah);
            $sheet->setCellValue('AF' . $row, $item->Kec_Letak_Tanah);
            $sheet->setCellValue('AG' . $row, $item->Tahun_C);
            $sheet->setCellValue('AH' . $row, $item->No_C);
            $sheet->setCellValue('AI' . $row, $item->No_Persil);
            $sheet->setCellValue('AJ' . $row, $item->Kelas);
            $sheet->setCellValue('AK' . $row, $item->Status_Tanah);
            $sheet->setCellValue('AL' . $row, $item->Status_Penggunaan);
            $sheet->setCellValue('AM' . $row, $item->Luas_Permohonan);
            $sheet->setCellValue('AN' . $row, $item->Batas_Utara);
            $sheet->setCellValue('AO' . $row, $item->Batas_Timur);
            $sheet->setCellValue('AP' . $row, $item->Batas_Selatan);
            $sheet->setCellValue('AQ' . $row, $item->Batas_Barat);
            $sheet->setCellValue('AR' . $row, $item->Tahun_Peralihan_1);
            $sheet->setCellValue('AS' . $row, $item->Peralihan_1_Kepada);
            $sheet->setCellValue('AT' . $row, $item->Tahun_Peralihan_2);
            $sheet->setCellValue('AU' . $row, $item->Peralihan_2_Kepada);
            $sheet->setCellValue('AV' . $row, $item->Sebab_Peralihan_2);
            $sheet->setCellValue('AW' . $row, $item->Dasar_Peralihan_2);
            $sheet->setCellValue('AX' . $row, $item->Pemilik_Sebelumnya);
            $sheet->setCellValue('AY' . $row, $item->Tahun_Perolehan_Terakhir);
            $sheet->setCellValue('AZ' . $row, $item->Sebab_Peralihan_Terkahir);
            $sheet->setCellValue('BA' . $row, $item->Nama_Perolehan_Terakhir);
            $sheet->setCellValue('BB' . $row, $item->Pemberi_Waris);
            $sheet->setCellValue('BC' . $row, $item->Tahun_Meninggal);
            $sheet->setCellValue('BD' . $row, $item->Bukti_Waris);
            $sheet->setCellValue('BE' . $row, $item->Bukti_Jual_Beli);
            $sheet->setCellValue('BF' . $row, $item->Bukti_Hibah);
            $sheet->setCellValue('BG' . $row, $item->Alas_Hak_Bukti_Perolehan);
            $sheet->setCellValue('BH' . $row, $item->Nama_Kades);
            $sheet->setCellValue('BI' . $row, $item->Nama_Saksi_1);
            $sheet->setCellValueExplicit('BJ' . $row, $item->NIK_Saksi_1, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
            $sheet->setCellValue('BK' . $row, $item->Agama_Saksi_1);
            $sheet->setCellValue('BL' . $row, $item->Usia_Saksi_1);
            $sheet->setCellValue('BM' . $row, $item->Pekerjaan_Saksi_1);
            $sheet->setCellValue('BN' . $row, $item->Alamat_Saksi_1);
            $sheet->setCellValue('BO' . $row, $item->Nama_Saksi_2);
            $sheet->setCellValueExplicit('BP' . $row, $item->NIK_Saksi_2, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
            $sheet->setCellValue('BQ' . $row, $item->Agama_Saksi_2);
            $sheet->setCellValue('BR' . $row, $item->Usia_Saksi_2);
            $sheet->setCellValue('BS' . $row, $item->Pekerjaan_Saksi_2);
            $sheet->setCellValue('BT' . $row, $item->Alamat_Saksi_2);
            $sheet->setCellValue('BU' . $row, $item->Koordinator);


            $row++;
        }

        // Simpan file excel
        $writer = new Xlsx($spreadsheet);
        $writer->save('Nominatif Pendaftaran PTSL Desa Pondokjoyo.xlsx');

        // Download file excel
        return response()->download(public_path('Nominatif Pendaftaran PTSL Desa Pondokjoyo.xlsx'));
    }

    public function downloadExcelMundurejo()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Ambil data dari database
        $data = Mundurejo::select('*')->get();

        // Tulis header kolom pada file excel
        $sheet->setCellValue('A1', 'No Nominatif');
        $sheet->setCellValue('B1', 'Blok');
        $sheet->setCellValue('C1', 'No SPPT');
        $sheet->setCellValue('D1', 'No Pengumuman');
        $sheet->setCellValue('E1', 'Sudah Pengumuman');
        $sheet->setCellValue('F1', 'Tanggal Pendataan');
        $sheet->setCellValue('G1', 'PBT');
        $sheet->setCellValue('H1', 'No Berkas');
        $sheet->setCellValue('I1', 'NUB');
        $sheet->setCellValue('J1', 'NIB');
        $sheet->setCellValue('K1', 'Luas Ukur');
        $sheet->setCellValue('L1', 'Beda Luas');
        $sheet->setCellValue('M1', 'Selisih Luas');
        $sheet->setCellValue('N1', 'No KTP NIK');
        $sheet->setCellValue('O1', 'Nama');
        $sheet->setCellValue('P1', 'Tempat Lahir');
        $sheet->setCellValue('Q1', 'Tanggal Lahir');
        $sheet->setCellValue('R1', 'Usia');
        $sheet->setCellValue('S1', 'Alamat Pemilik');
        $sheet->setCellValue('T1', 'Agama');
        $sheet->setCellValue('U1', 'Pekerjaan');
        $sheet->setCellValue('V1', 'An No KTP NIK');
        $sheet->setCellValue('W1', 'An Nama');
        $sheet->setCellValue('X1', 'An Tempat Lahir');
        $sheet->setCellValue('Y1', 'An Tanggal Lahir');
        $sheet->setCellValue('Z1', 'An Usia');
        $sheet->setCellValue('AA1', 'An Alamat Pemilik');
        $sheet->setCellValue('AB1', 'RT Letak Tanah');
        $sheet->setCellValue('AC1', 'RW Letak Tanah');
        $sheet->setCellValue('AD1', 'Dusun Letak Tanah');
        $sheet->setCellValue('AE1', 'Desa Letak Tanah');
        $sheet->setCellValue('AF1', 'Kec Letak Tanah');
        $sheet->setCellValue('AG1', 'Tahun C');
        $sheet->setCellValue('AH1', 'No C');
        $sheet->setCellValue('AI1', 'No Persil');
        $sheet->setCellValue('AJ1', 'Kelas');
        $sheet->setCellValue('AK1', 'Status Tanah');
        $sheet->setCellValue('AL1', 'Status Penggunaan');
        $sheet->setCellValue('AM1', 'Luas Permohonan');
        $sheet->setCellValue('AN1', 'Batas Utara');
        $sheet->setCellValue('AO1', 'Batas Timur');
        $sheet->setCellValue('AP1', 'Batas Selatan');
        $sheet->setCellValue('AQ1', 'Batas Barat');
        $sheet->setCellValue('AR1', 'Tahun Peralihan 1');
        $sheet->setCellValue('AS1', 'Peralihan 1 Kepada');
        $sheet->setCellValue('AT1', 'Tahun Peralihan 2');
        $sheet->setCellValue('AU1', 'Peralihan 2 Kepada');
        $sheet->setCellValue('AV1', 'Sebab Peralihan 2');
        $sheet->setCellValue('AW1', 'Dasar Peralihan 2');
        $sheet->setCellValue('AX1', 'Pemilik Sebelumnya');
        $sheet->setCellValue('AY1', 'Tahun Perolehan Terakhir');
        $sheet->setCellValue('AZ1', 'Sebab Peralihan Terkahir');
        $sheet->setCellValue('BA1', 'Nama Perolehan Terakhir');
        $sheet->setCellValue('BB1', 'Pemberi Waris');
        $sheet->setCellValue('BC1', 'Tahun Meninggal');
        $sheet->setCellValue('BD1', 'Bukti Waris');
        $sheet->setCellValue('BE1', 'Bukti Jual Beli');
        $sheet->setCellValue('BF1', 'Bukti Hibah');
        $sheet->setCellValue('BG1', 'Alas Hak Bukti Perolehan');
        $sheet->setCellValue('BH1', 'Nama Kades');
        $sheet->setCellValue('BI1', 'Nama Saksi 1');
        $sheet->setCellValue('BJ1', 'NIK Saksi 1');
        $sheet->setCellValue('BK1', 'Agama Saksi 1');
        $sheet->setCellValue('BL1', 'Usia Saksi 1');
        $sheet->setCellValue('BM1', 'Pekerjaan Saksi 1');
        $sheet->setCellValue('BN1', 'Alamat Saksi 1');
        $sheet->setCellValue('BO1', 'Nama Saksi 2');
        $sheet->setCellValue('BP1', 'NIK Saksi 2');
        $sheet->setCellValue('BQ1', 'Agama Saksi 2');
        $sheet->setCellValue('BR1', 'Usia Saksi 2');
        $sheet->setCellValue('BS1', 'Pekerjaan Saksi 2');
        $sheet->setCellValue('BT1', 'Alamat Saksi 2');
        $sheet->setCellValue('BU1', 'Koordinator');


        // Tulis data pada file excel
        $row = 2;
        foreach ($data as $item) {
            $sheet->setCellValue('A' . $row, $item->id);
            $sheet->setCellValue('B' . $row, $item->Blok);
            $sheet->setCellValue('C' . $row, $item->No_SPPT);
            $sheet->setCellValue('D' . $row, $item->No_Pengumuman);
            $sheet->setCellValue('E' . $row, $item->Sudah_Pengumuman);
            $sheet->setCellValue('F' . $row, $item->Tgl_Pendataan);
            $sheet->setCellValue('G' . $row, $item->PBT);
            $sheet->setCellValue('H' . $row, $item->No_Berkas);
            $sheet->setCellValue('I' . $row, $item->NUB);
            $sheet->setCellValue('J' . $row, $item->NIB);
            $sheet->setCellValue('K' . $row, $item->Luas_Ukur);
            $sheet->setCellValue('L' . $row, $item->Beda_Luas);
            $sheet->setCellValue('M' . $row, $item->Selisih_Luas);
            $sheet->setCellValueExplicit('N' . $row, $item->No_KTP_NIK, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
            $sheet->setCellValue('O' . $row, $item->Nama);
            $sheet->setCellValue('P' . $row, $item->Tempat_Lahir);
            $sheet->setCellValue('Q' . $row, $item->Tanggal_Lahir);
            $sheet->setCellValue('R' . $row, $item->Usia);
            $sheet->setCellValue('S' . $row, $item->Alamat_Pemilik);
            $sheet->setCellValue('T' . $row, $item->Agama);
            $sheet->setCellValue('U' . $row, $item->Pekerjaan);
            $sheet->setCellValueExplicit('V' . $row, $item->An_No_KTP_NIK, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
            $sheet->setCellValue('W' . $row, $item->An_Nama);
            $sheet->setCellValue('X' . $row, $item->An_Tempat_Lahir);
            $sheet->setCellValue('Y' . $row, $item->An_Tanggal_Lahir);
            $sheet->setCellValue('Z' . $row, $item->An_Usia);
            $sheet->setCellValue('AA' . $row, $item->An_Alamat_Pemilik);
            $sheet->setCellValue('AB' . $row, $item->RT_Letak_Tanah);
            $sheet->setCellValue('AC' . $row, $item->RW_Letak_Tanah);
            $sheet->setCellValue('AD' . $row, $item->Dusun_Letak_Tanah);
            $sheet->setCellValue('AE' . $row, $item->Desa_Letak_Tanah);
            $sheet->setCellValue('AF' . $row, $item->Kec_Letak_Tanah);
            $sheet->setCellValue('AG' . $row, $item->Tahun_C);
            $sheet->setCellValue('AH' . $row, $item->No_C);
            $sheet->setCellValue('AI' . $row, $item->No_Persil);
            $sheet->setCellValue('AJ' . $row, $item->Kelas);
            $sheet->setCellValue('AK' . $row, $item->Status_Tanah);
            $sheet->setCellValue('AL' . $row, $item->Status_Penggunaan);
            $sheet->setCellValue('AM' . $row, $item->Luas_Permohonan);
            $sheet->setCellValue('AN' . $row, $item->Batas_Utara);
            $sheet->setCellValue('AO' . $row, $item->Batas_Timur);
            $sheet->setCellValue('AP' . $row, $item->Batas_Selatan);
            $sheet->setCellValue('AQ' . $row, $item->Batas_Barat);
            $sheet->setCellValue('AR' . $row, $item->Tahun_Peralihan_1);
            $sheet->setCellValue('AS' . $row, $item->Peralihan_1_Kepada);
            $sheet->setCellValue('AT' . $row, $item->Tahun_Peralihan_2);
            $sheet->setCellValue('AU' . $row, $item->Peralihan_2_Kepada);
            $sheet->setCellValue('AV' . $row, $item->Sebab_Peralihan_2);
            $sheet->setCellValue('AW' . $row, $item->Dasar_Peralihan_2);
            $sheet->setCellValue('AX' . $row, $item->Pemilik_Sebelumnya);
            $sheet->setCellValue('AY' . $row, $item->Tahun_Perolehan_Terakhir);
            $sheet->setCellValue('AZ' . $row, $item->Sebab_Peralihan_Terkahir);
            $sheet->setCellValue('BA' . $row, $item->Nama_Perolehan_Terakhir);
            $sheet->setCellValue('BB' . $row, $item->Pemberi_Waris);
            $sheet->setCellValue('BC' . $row, $item->Tahun_Meninggal);
            $sheet->setCellValue('BD' . $row, $item->Bukti_Waris);
            $sheet->setCellValue('BE' . $row, $item->Bukti_Jual_Beli);
            $sheet->setCellValue('BF' . $row, $item->Bukti_Hibah);
            $sheet->setCellValue('BG' . $row, $item->Alas_Hak_Bukti_Perolehan);
            $sheet->setCellValue('BH' . $row, $item->Nama_Kades);
            $sheet->setCellValue('BI' . $row, $item->Nama_Saksi_1);
            $sheet->setCellValueExplicit('BJ' . $row, $item->NIK_Saksi_1, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
            $sheet->setCellValue('BK' . $row, $item->Agama_Saksi_1);
            $sheet->setCellValue('BL' . $row, $item->Usia_Saksi_1);
            $sheet->setCellValue('BM' . $row, $item->Pekerjaan_Saksi_1);
            $sheet->setCellValue('BN' . $row, $item->Alamat_Saksi_1);
            $sheet->setCellValue('BO' . $row, $item->Nama_Saksi_2);
            $sheet->setCellValueExplicit('BP' . $row, $item->NIK_Saksi_2, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
            $sheet->setCellValue('BQ' . $row, $item->Agama_Saksi_2);
            $sheet->setCellValue('BR' . $row, $item->Usia_Saksi_2);
            $sheet->setCellValue('BS' . $row, $item->Pekerjaan_Saksi_2);
            $sheet->setCellValue('BT' . $row, $item->Alamat_Saksi_2);
            $sheet->setCellValue('BU' . $row, $item->Koordinator);

            $row++;
        }

        // Simpan file excel
        $writer = new Xlsx($spreadsheet);
        $writer->save('Nominatif Pendaftaran PTSL Desa Mundurejo.xlsx');

        // Download file excel
        return response()->download(public_path('Nominatif Pendaftaran PTSL Desa Mundurejo.xlsx'));
    }

    public function exportMundurejo($No_Nominatif)
    {
        $data = Mundurejo::find($No_Nominatif);
        if($data->No_KTP_NIK == $data->An_No_KTP_NIK){
            $phpWord = new \PhpOffice\PhpWord\TemplateProcessor('mundurejo.docx');
        } else {
            $phpWord = new \PhpOffice\PhpWord\TemplateProcessor('mundurejo_dibawah_umur.docx');
        }

        
        $phpWord->setValues([
            'id' => $data->id,
            'Blok' => $data->Blok,
            'No_SPPT' => $data->No_SPPT,
            'Tgl_Pendataan' => $data->Tgl_Pendataan,
            'PBT' => $data->PBT,
            'No_Berkas' => $data->No_Berkas,
            'NUB' => $data->NUB,
            'NIB' => $data->NIB,
            'Luas_Ukur' => $data->Luas_Ukur,
            'Beda_Luas' => $data->Beda_Luas,

            'No_KTP_NIK' => $data->No_KTP_NIK,
            'Nama' => $data->Nama,
            'Tempat_Lahir' => $data->Tempat_Lahir,
            'Tanggal_Lahir' => $data->Tanggal_Lahir,
            'Usia' => $data->Usia,
            'Alamat_Pemilik' => $data->Alamat_Pemilik,
            'Agama' => $data->Agama,
            'Pekerjaan' => $data->Pekerjaan,

            'An_No_KTP_NIK' => $data->An_No_KTP_NIK,
            'An_Nama' => $data->An_Nama,
            'An_Tempat_Lahir' => $data->An_Tempat_Lahir,
            'An_Tanggal_Lahir' => $data->An_Tanggal_Lahir,
            'An_Usia' => $data->An_Usia,
            'An_Alamat_Pemilik' => $data->An_Alamat_Pemilik,

            'RT_Letak_Tanah' => $data->RT_Letak_Tanah,
            'RW_Letak_Tanah' => $data->RW_Letak_Tanah,
            'Dusun_Letak_Tanah' => $data->Dusun_Letak_Tanah,
            'Desa_Letak_Tanah' => $data->Desa_Letak_Tanah,
            'Kec_Letak_Tanah' => $data->Kec_Letak_Tanah,
            'Tahun_C' => $data->Tahun_C,
            'No_C' => $data->No_C,
            'No_Persil' => $data->No_Persil,
            'Kelas' => $data->Kelas,
            'Status_Tanah' => $data->Status_Tanah,
            'Status_Penggunaan' => $data->Status_Penggunaan,
            'Luas_Permohonan' => $data->Luas_Permohonan,
            'Batas_Utara' => $data->Batas_Utara,
            'Batas_Timur' => $data->Batas_Timur,
            'Batas_Selatan' => $data->Batas_Selatan,
            'Batas_Barat' => $data->Batas_Barat,

            'Tahun_Peralihan_1' => $data->Tahun_Peralihan_1,
            'Peralihan_1_Kepada' => $data->Peralihan_1_Kepada,
            'Tahun_Peralihan_2' => $data->Tahun_Peralihan_2,
            'Peralihan_2_Kepada' => $data->Peralihan_2_Kepada,
            'Sebab_Peralihan_2' => $data->Sebab_Peralihan_2,
            'Dasar_Peralihan_2' => $data->Dasar_Peralihan_2,
            'Pemilik_Sebelumnya' => $data->Pemilik_Sebelumnya,
            'Tahun_Perolehan_Terakhir' => $data->Tahun_Perolehan_Terakhir,
            'Sebab_Peralihan_Terakhir' => $data->Sebab_Peralihan_Terakhir,
            'Nama_Perolehan_Terakhir' => $data->Nama_Perolehan_Terakhir,
            'Pemberi_Waris' => $data->Pemberi_Waris,
            'Tahun_Meninggal' => $data->Tahun_Meninggal,
            'Bukti_Waris' => $data->Bukti_Waris,
            'Bukti_Jual_Beli' => $data->Bukti_Jual_Beli,
            'Bukti_Hibah' => $data->Bukti_Hibah,
            'Alas_Hak_Bukti_Perolehan' => $data->Alas_Hak_Bukti_Perolehan,

            'Nama_Kades' => $data->Nama_Kades,
            'Nama_Saksi_1' => $data->Nama_Saksi_1,
            'NIK_Saksi_1' => $data->NIK_Saksi_1,
            'Agama_Saksi_1' => $data->Agama_Saksi_1,
            'Usia_Saksi_1' => $data->Usia_Saksi_1,
            'Pekerjaan_Saksi_1' => $data->Pekerjaan_Saksi_1,
            'Alamat_Saksi_1' => $data->Alamat_Saksi_1,
            'Nama_Saksi_2' => $data->Nama_Saksi_2,
            'NIK_Saksi_2' => $data->NIK_Saksi_2,
            'Agama_Saksi_2' => $data->Agama_Saksi_2,
            'Usia_Saksi_2' => $data->Usia_Saksi_2,
            'Pekerjaan_Saksi_2' => $data->Pekerjaan_Saksi_2,
            'Alamat_Saksi_2' => $data->Alamat_Saksi_2,        
        ]);

        $phpWord->saveAs( $data->id. ' - '. $data->Nama. '.docx');
        return response()->download(public_path( $data->id. ' - '. $data->Nama. '.docx'))->deleteFileAfterSend(true);
    }

    public function exportPondokjoyo($No_Nominatif)
    {
        $data = Pondokjoyo::find($No_Nominatif);
        if($data->No_KTP_NIK == $data->An_No_KTP_NIK){
            $phpWord = new \PhpOffice\PhpWord\TemplateProcessor('pondokjoyo.docx');
        } else {
            $phpWord = new \PhpOffice\PhpWord\TemplateProcessor('pondokjoyo_dibawah_umur.docx');
        }

        
        $phpWord->setValues([
            'id' => $data->id,
            'Blok' => $data->Blok,
            'No_SPPT' => $data->No_SPPT,
            'Tgl_Pendataan' => $data->Tgl_Pendataan,
            'PBT' => $data->PBT,
            'No_Berkas' => $data->No_Berkas,
            'NUB' => $data->NUB,
            'NIB' => $data->NIB,
            'Luas_Ukur' => $data->Luas_Ukur,
            'Beda_Luas' => $data->Beda_Luas,

            'No_KTP_NIK' => $data->No_KTP_NIK,
            'Nama' => $data->Nama,
            'Tempat_Lahir' => $data->Tempat_Lahir,
            'Tanggal_Lahir' => $data->Tanggal_Lahir,
            'Usia' => $data->Usia,
            'Alamat_Pemilik' => $data->Alamat_Pemilik,
            'Agama' => $data->Agama,
            'Pekerjaan' => $data->Pekerjaan,

            'An_No_KTP_NIK' => $data->An_No_KTP_NIK,
            'An_Nama' => $data->An_Nama,
            'An_Tempat_Lahir' => $data->An_Tempat_Lahir,
            'An_Tanggal_Lahir' => $data->An_Tanggal_Lahir,
            'An_Usia' => $data->An_Usia,
            'An_Alamat_Pemilik' => $data->An_Alamat_Pemilik,

            'RT_Letak_Tanah' => $data->RT_Letak_Tanah,
            'RW_Letak_Tanah' => $data->RW_Letak_Tanah,
            'Dusun_Letak_Tanah' => $data->Dusun_Letak_Tanah,
            'Desa_Letak_Tanah' => $data->Desa_Letak_Tanah,
            'Kec_Letak_Tanah' => $data->Kec_Letak_Tanah,
            'Tahun_C' => $data->Tahun_C,
            'No_C' => $data->No_C,
            'No_Persil' => $data->No_Persil,
            'Kelas' => $data->Kelas,
            'Status_Tanah' => $data->Status_Tanah,
            'Status_Penggunaan' => $data->Status_Penggunaan,
            'Luas_Permohonan' => $data->Luas_Permohonan,
            'Batas_Utara' => $data->Batas_Utara,
            'Batas_Timur' => $data->Batas_Timur,
            'Batas_Selatan' => $data->Batas_Selatan,
            'Batas_Barat' => $data->Batas_Barat,

            'Tahun_Peralihan_1' => $data->Tahun_Peralihan_1,
            'Peralihan_1_Kepada' => $data->Peralihan_1_Kepada,
            'Tahun_Peralihan_2' => $data->Tahun_Peralihan_2,
            'Peralihan_2_Kepada' => $data->Peralihan_2_Kepada,
            'Sebab_Peralihan_2' => $data->Sebab_Peralihan_2,
            'Dasar_Peralihan_2' => $data->Dasar_Peralihan_2,
            'Pemilik_Sebelumnya' => $data->Pemilik_Sebelumnya,
            'Tahun_Perolehan_Terakhir' => $data->Tahun_Perolehan_Terakhir,
            'Sebab_Peralihan_Terakhir' => $data->Sebab_Peralihan_Terakhir,
            'Nama_Perolehan_Terakhir' => $data->Nama_Perolehan_Terakhir,
            'Pemberi_Waris' => $data->Pemberi_Waris,
            'Tahun_Meninggal' => $data->Tahun_Meninggal,
            'Bukti_Waris' => $data->Bukti_Waris,
            'Bukti_Jual_Beli' => $data->Bukti_Jual_Beli,
            'Bukti_Hibah' => $data->Bukti_Hibah,
            'Alas_Hak_Bukti_Perolehan' => $data->Alas_Hak_Bukti_Perolehan,

            'Nama_Kades' => $data->Nama_Kades,
            'Nama_Saksi_1' => $data->Nama_Saksi_1,
            'NIK_Saksi_1' => $data->NIK_Saksi_1,
            'Agama_Saksi_1' => $data->Agama_Saksi_1,
            'Usia_Saksi_1' => $data->Usia_Saksi_1,
            'Pekerjaan_Saksi_1' => $data->Pekerjaan_Saksi_1,
            'Alamat_Saksi_1' => $data->Alamat_Saksi_1,
            'Nama_Saksi_2' => $data->Nama_Saksi_2,
            'NIK_Saksi_2' => $data->NIK_Saksi_2,
            'Agama_Saksi_2' => $data->Agama_Saksi_2,
            'Usia_Saksi_2' => $data->Usia_Saksi_2,
            'Pekerjaan_Saksi_2' => $data->Pekerjaan_Saksi_2,
            'Alamat_Saksi_2' => $data->Alamat_Saksi_2,        
        ]);

        $phpWord->saveAs( $data->id. ' - '. $data->Nama. '.docx');
        return response()->download(public_path( $data->id. ' - '. $data->Nama. '.docx'))->deleteFileAfterSend(true);
    }
}
