<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Mundurejo;
use App\Models\Sidomekar;
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
        $sheet->setCellValue('D1', 'Tanggal Pendataan');
        $sheet->setCellValue('E1', 'PBT');
        $sheet->setCellValue('F1', 'No Berkas');
        $sheet->setCellValue('G1', 'NUB');
        $sheet->setCellValue('H1', 'NIB');
        $sheet->setCellValue('I1', 'Luas Ukur');
        $sheet->setCellValue('J1', 'Beda Luas');
        $sheet->setCellValue('K1', 'Selisih Luas');
        $sheet->setCellValue('L1', 'No KTP NIK');
        $sheet->setCellValue('M1', 'Nama');
        $sheet->setCellValue('N1', 'Tempat Lahir');
        $sheet->setCellValue('O1', 'Tanggal Lahir');
        $sheet->setCellValue('P1', 'Usia');
        $sheet->setCellValue('Q1', 'Alamat Pemilik');
        $sheet->setCellValue('R1', 'Agama');
        $sheet->setCellValue('S1', 'Pekerjaan');
        $sheet->setCellValue('T1', 'An No KTP NIK');
        $sheet->setCellValue('U1', 'An Nama');
        $sheet->setCellValue('V1', 'An Tempat Lahir');
        $sheet->setCellValue('W1', 'An Tanggal Lahir');
        $sheet->setCellValue('X1', 'An Usia');
        $sheet->setCellValue('Y1', 'An Alamat Pemilik');
        $sheet->setCellValue('Z1', 'RT Letak Tanah');
        $sheet->setCellValue('AA1', 'RW Letak Tanah');
        $sheet->setCellValue('AB1', 'Dusun Letak Tanah');
        $sheet->setCellValue('AC1', 'Desa Letak Tanah');
        $sheet->setCellValue('AD1', 'Kec Letak Tanah');
        $sheet->setCellValue('AE1', 'Tahun C');
        $sheet->setCellValue('AF1', 'No C');
        $sheet->setCellValue('AG1', 'No Persil');
        $sheet->setCellValue('AH1', 'Kelas');
        $sheet->setCellValue('AI1', 'Status Tanah');
        $sheet->setCellValue('AJ1', 'Status Penggunaan');
        $sheet->setCellValue('AK1', 'Luas Permohonan');
        $sheet->setCellValue('AL1', 'Batas Utara');
        $sheet->setCellValue('AM1', 'Batas Timur');
        $sheet->setCellValue('AN1', 'Batas Selatan');
        $sheet->setCellValue('AO1', 'Batas Barat');
        $sheet->setCellValue('AP1', 'Tahun Peralihan 1');
        $sheet->setCellValue('AQ1', 'Peralihan 1 Kepada');
        $sheet->setCellValue('AR1', 'Tahun Peralihan 2');
        $sheet->setCellValue('AS1', 'Peralihan 2 Kepada');
        $sheet->setCellValue('AT1', 'Sebab Peralihan 2');
        $sheet->setCellValue('AU1', 'Dasar Peralihan 2');
        $sheet->setCellValue('AV1', 'Pemilik Sebelumnya');
        $sheet->setCellValue('AW1', 'Tahun Perolehan Terakhir');
        $sheet->setCellValue('AX1', 'Sebab Peralihan Terkahir');
        $sheet->setCellValue('AY1', 'Nama Perolehan Terakhir');
        $sheet->setCellValue('AZ1', 'Pemberi Waris');
        $sheet->setCellValue('BA1', 'Tahun Meninggal');
        $sheet->setCellValue('BB1', 'Bukti Waris');
        $sheet->setCellValue('BC1', 'Bukti Jual Beli');
        $sheet->setCellValue('BD1', 'Bukti Hibah');
        $sheet->setCellValue('BE1', 'Alas Hak Bukti Perolehan');
        $sheet->setCellValue('BF1', 'Nama Kades');
        $sheet->setCellValue('BG1', 'Nama Saksi 1');
        $sheet->setCellValue('BH1', 'NIK Saksi 1');
        $sheet->setCellValue('BI1', 'Agama Saksi 1');
        $sheet->setCellValue('BJ1', 'Usia Saksi 1');
        $sheet->setCellValue('BK1', 'Pekerjaan Saksi 1');
        $sheet->setCellValue('BL1', 'Alamat Saksi 1');
        $sheet->setCellValue('BM1', 'Nama Saksi 2');
        $sheet->setCellValue('BN1', 'NIK Saksi 2');
        $sheet->setCellValue('BO1', 'Agama Saksi 2');
        $sheet->setCellValue('BP1', 'Usia Saksi 2');
        $sheet->setCellValue('BQ1', 'Pekerjaan Saksi 2');
        $sheet->setCellValue('BR1', 'Alamat Saksi 2');
        $sheet->setCellValue('BS1', 'Koordinator');

        // Tulis data pada file excel
        $row = 2;
        foreach ($data as $item) {
            $sheet->setCellValue('A' . $row, $item->id);
            $sheet->setCellValue('B' . $row, $item->Blok);
            $sheet->setCellValue('C' . $row, $item->No_SPPT);
            $sheet->setCellValue('D' . $row, Carbon::createFromFormat('Y-m-d', $item->Tgl_Pendataan)->format('d-m-Y'));
            $sheet->setCellValue('E' . $row, $item->PBT);
            $sheet->setCellValue('F' . $row, $item->No_Berkas);
            $sheet->setCellValue('G' . $row, $item->NUB);
            $sheet->setCellValue('H' . $row, $item->NIB);
            $sheet->setCellValue('I' . $row, $item->Luas_Ukur);
            $sheet->setCellValue('J' . $row, $item->Beda_Luas);
            $sheet->setCellValue('K' . $row, $item->Selisih_Luas);
            $sheet->setCellValueExplicit('L' . $row, $item->No_KTP_NIK, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
            $sheet->setCellValue('M' . $row, $item->Nama);
            $sheet->setCellValue('N' . $row, $item->Tempat_Lahir);
            $sheet->setCellValue('O' . $row, Carbon::createFromFormat('Y-m-d', $item->Tanggal_Lahir)->format('d-m-Y'));
            $sheet->setCellValue('P' . $row, $item->Usia);
            $sheet->setCellValue('Q' . $row, $item->Alamat_Pemilik);
            $sheet->setCellValue('R' . $row, $item->Agama);
            $sheet->setCellValue('S' . $row, $item->Pekerjaan);
            $sheet->setCellValueExplicit('T' . $row, $item->An_No_KTP_NIK, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
            $sheet->setCellValue('U' . $row, $item->An_Nama);
            $sheet->setCellValue('V' . $row, $item->An_Tempat_Lahir);
            $sheet->setCellValue('W' . $row, Carbon::createFromFormat('Y-m-d', $item->An_Tanggal_Lahir)->format('d-m-Y'));
            $sheet->setCellValue('X' . $row, $item->An_Usia);
            $sheet->setCellValue('Y' . $row, $item->An_Alamat_Pemilik);
            $sheet->setCellValue('Z' . $row, $item->RT_Letak_Tanah);
            $sheet->setCellValue('AA' . $row, $item->RW_Letak_Tanah);
            $sheet->setCellValue('AB' . $row, $item->Dusun_Letak_Tanah);
            $sheet->setCellValue('AC' . $row, $item->Desa_Letak_Tanah);
            $sheet->setCellValue('AD' . $row, $item->Kec_Letak_Tanah);
            $sheet->setCellValue('AE' . $row, $item->Tahun_C);
            $sheet->setCellValue('AF' . $row, $item->No_C);
            $sheet->setCellValue('AG' . $row, $item->No_Persil);
            $sheet->setCellValue('AH' . $row, $item->Kelas);
            $sheet->setCellValue('AI' . $row, $item->Status_Tanah);
            $sheet->setCellValue('AJ' . $row, $item->Status_Penggunaan);
            $sheet->setCellValue('AK' . $row, $item->Luas_Permohonan);
            $sheet->setCellValue('AL' . $row, $item->Batas_Utara);
            $sheet->setCellValue('AM' . $row, $item->Batas_Timur);
            $sheet->setCellValue('AN' . $row, $item->Batas_Selatan);
            $sheet->setCellValue('AO' . $row, $item->Batas_Barat);
            $sheet->setCellValue('AP' . $row, $item->Tahun_Peralihan_1);
            $sheet->setCellValue('AQ' . $row, $item->Peralihan_1_Kepada);
            $sheet->setCellValue('AR' . $row, $item->Tahun_Peralihan_2);
            $sheet->setCellValue('AS' . $row, $item->Peralihan_2_Kepada);
            $sheet->setCellValue('AT' . $row, $item->Sebab_Peralihan_2);
            $sheet->setCellValue('AU' . $row, $item->Dasar_Peralihan_2);
            $sheet->setCellValue('AV' . $row, $item->Pemilik_Sebelumnya);
            $sheet->setCellValue('AW' . $row, $item->Tahun_Perolehan_Terakhir);
            $sheet->setCellValue('AX' . $row, $item->Sebab_Peralihan_Terkahir);
            $sheet->setCellValue('AY' . $row, $item->Nama_Perolehan_Terakhir);
            $sheet->setCellValue('AZ' . $row, $item->Pemberi_Waris);
            $sheet->setCellValue('BA' . $row, $item->Tahun_Meninggal);
            $sheet->setCellValue('BB' . $row, $item->Bukti_Waris);
            $sheet->setCellValue('BC' . $row, $item->Bukti_Jual_Beli);
            $sheet->setCellValue('BD' . $row, $item->Bukti_Hibah);
            $sheet->setCellValue('BE' . $row, $item->Alas_Hak_Bukti_Perolehan);
            $sheet->setCellValue('BF' . $row, $item->Nama_Kades);
            $sheet->setCellValue('BG' . $row, $item->Nama_Saksi_1);
            $sheet->setCellValueExplicit('BH' . $row, $item->NIK_Saksi_1, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
            $sheet->setCellValue('BI' . $row, $item->Agama_Saksi_1);
            $sheet->setCellValue('BJ' . $row, $item->Usia_Saksi_1);
            $sheet->setCellValue('BK' . $row, $item->Pekerjaan_Saksi_1);
            $sheet->setCellValue('BL' . $row, $item->Alamat_Saksi_1);
            $sheet->setCellValue('BM' . $row, $item->Nama_Saksi_2);
            $sheet->setCellValueExplicit('BN' . $row, $item->NIK_Saksi_2, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
            $sheet->setCellValue('BO' . $row, $item->Agama_Saksi_2);
            $sheet->setCellValue('BP' . $row, $item->Usia_Saksi_2);
            $sheet->setCellValue('BQ' . $row, $item->Pekerjaan_Saksi_2);
            $sheet->setCellValue('BR' . $row, $item->Alamat_Saksi_2);
            $sheet->setCellValue('BS' . $row, $item->Koordinator);


            $row++;
        }

        // Simpan file excel
        $writer = new Xlsx($spreadsheet);
        $writer->save('Nominatif Pendaftaran PTSL Desa Pondokjoyo.xlsx');

        // Download file excel
        return response()->download(public_path('Nominatif Pendaftaran PTSL Desa Pondokjoyo.xlsx'))->deleteFileAfterSend(true);
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
        $sheet->setCellValue('D1', 'Tanggal Pendataan');
        $sheet->setCellValue('E1', 'PBT');
        $sheet->setCellValue('F1', 'No Berkas');
        $sheet->setCellValue('G1', 'NUB');
        $sheet->setCellValue('H1', 'NIB');
        $sheet->setCellValue('I1', 'Luas Ukur');
        $sheet->setCellValue('J1', 'Beda Luas');
        $sheet->setCellValue('K1', 'Selisih Luas');
        $sheet->setCellValue('L1', 'No KTP NIK');
        $sheet->setCellValue('M1', 'Nama');
        $sheet->setCellValue('N1', 'Tempat Lahir');
        $sheet->setCellValue('O1', 'Tanggal Lahir');
        $sheet->setCellValue('P1', 'Usia');
        $sheet->setCellValue('Q1', 'Alamat Pemilik');
        $sheet->setCellValue('R1', 'Agama');
        $sheet->setCellValue('S1', 'Pekerjaan');
        $sheet->setCellValue('T1', 'An No KTP NIK');
        $sheet->setCellValue('U1', 'An Nama');
        $sheet->setCellValue('V1', 'An Tempat Lahir');
        $sheet->setCellValue('W1', 'An Tanggal Lahir');
        $sheet->setCellValue('X1', 'An Usia');
        $sheet->setCellValue('Y1', 'An Alamat Pemilik');
        $sheet->setCellValue('Z1', 'RT Letak Tanah');
        $sheet->setCellValue('AA1', 'RW Letak Tanah');
        $sheet->setCellValue('AB1', 'Dusun Letak Tanah');
        $sheet->setCellValue('AC1', 'Desa Letak Tanah');
        $sheet->setCellValue('AD1', 'Kec Letak Tanah');
        $sheet->setCellValue('AE1', 'Tahun C');
        $sheet->setCellValue('AF1', 'No C');
        $sheet->setCellValue('AG1', 'No Persil');
        $sheet->setCellValue('AH1', 'Kelas');
        $sheet->setCellValue('AI1', 'Status Tanah');
        $sheet->setCellValue('AJ1', 'Status Penggunaan');
        $sheet->setCellValue('AK1', 'Luas Permohonan');
        $sheet->setCellValue('AL1', 'Batas Utara');
        $sheet->setCellValue('AM1', 'Batas Timur');
        $sheet->setCellValue('AN1', 'Batas Selatan');
        $sheet->setCellValue('AO1', 'Batas Barat');
        $sheet->setCellValue('AP1', 'Tahun Peralihan 1');
        $sheet->setCellValue('AQ1', 'Peralihan 1 Kepada');
        $sheet->setCellValue('AR1', 'Tahun Peralihan 2');
        $sheet->setCellValue('AS1', 'Peralihan 2 Kepada');
        $sheet->setCellValue('AT1', 'Sebab Peralihan 2');
        $sheet->setCellValue('AU1', 'Dasar Peralihan 2');
        $sheet->setCellValue('AV1', 'Pemilik Sebelumnya');
        $sheet->setCellValue('AW1', 'Tahun Perolehan Terakhir');
        $sheet->setCellValue('AX1', 'Sebab Peralihan Terkahir');
        $sheet->setCellValue('AY1', 'Nama Perolehan Terakhir');
        $sheet->setCellValue('AZ1', 'Pemberi Waris');
        $sheet->setCellValue('BA1', 'Tahun Meninggal');
        $sheet->setCellValue('BB1', 'Bukti Waris');
        $sheet->setCellValue('BC1', 'Bukti Jual Beli');
        $sheet->setCellValue('BD1', 'Bukti Hibah');
        $sheet->setCellValue('BE1', 'Alas Hak Bukti Perolehan');
        $sheet->setCellValue('BF1', 'Nama Kades');
        $sheet->setCellValue('BG1', 'Nama Saksi 1');
        $sheet->setCellValue('BH1', 'NIK Saksi 1');
        $sheet->setCellValue('BI1', 'Agama Saksi 1');
        $sheet->setCellValue('BJ1', 'Usia Saksi 1');
        $sheet->setCellValue('BK1', 'Pekerjaan Saksi 1');
        $sheet->setCellValue('BL1', 'Alamat Saksi 1');
        $sheet->setCellValue('BM1', 'Nama Saksi 2');
        $sheet->setCellValue('BN1', 'NIK Saksi 2');
        $sheet->setCellValue('BO1', 'Agama Saksi 2');
        $sheet->setCellValue('BP1', 'Usia Saksi 2');
        $sheet->setCellValue('BQ1', 'Pekerjaan Saksi 2');
        $sheet->setCellValue('BR1', 'Alamat Saksi 2');
        $sheet->setCellValue('BS1', 'Koordinator');

        // Tulis data pada file excel
        $row = 2;
        foreach ($data as $item) {
            $sheet->setCellValue('A' . $row, $item->id);
            $sheet->setCellValue('B' . $row, $item->Blok);
            $sheet->setCellValue('C' . $row, $item->No_SPPT);
            $sheet->setCellValue('D' . $row, Carbon::createFromFormat('Y-m-d', $item->Tgl_Pendataan)->format('d-m-Y'));
            $sheet->setCellValue('E' . $row, $item->PBT);
            $sheet->setCellValue('F' . $row, $item->No_Berkas);
            $sheet->setCellValue('G' . $row, $item->NUB);
            $sheet->setCellValue('H' . $row, $item->NIB);
            $sheet->setCellValue('I' . $row, $item->Luas_Ukur);
            $sheet->setCellValue('J' . $row, $item->Beda_Luas);
            $sheet->setCellValue('K' . $row, $item->Selisih_Luas);
            $sheet->setCellValueExplicit('L' . $row, $item->No_KTP_NIK, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
            $sheet->setCellValue('M' . $row, $item->Nama);
            $sheet->setCellValue('N' . $row, $item->Tempat_Lahir);
            $sheet->setCellValue('O' . $row, Carbon::createFromFormat('Y-m-d', $item->Tanggal_Lahir)->format('d-m-Y'));
            $sheet->setCellValue('P' . $row, $item->Usia);
            $sheet->setCellValue('Q' . $row, $item->Alamat_Pemilik);
            $sheet->setCellValue('R' . $row, $item->Agama);
            $sheet->setCellValue('S' . $row, $item->Pekerjaan);
            $sheet->setCellValueExplicit('T' . $row, $item->An_No_KTP_NIK, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
            $sheet->setCellValue('U' . $row, $item->An_Nama);
            $sheet->setCellValue('V' . $row, $item->An_Tempat_Lahir);
            $sheet->setCellValue('W' . $row, Carbon::createFromFormat('Y-m-d', $item->An_Tanggal_Lahir)->format('d-m-Y'));
            $sheet->setCellValue('X' . $row, $item->An_Usia);
            $sheet->setCellValue('Y' . $row, $item->An_Alamat_Pemilik);
            $sheet->setCellValue('Z' . $row, $item->RT_Letak_Tanah);
            $sheet->setCellValue('AA' . $row, $item->RW_Letak_Tanah);
            $sheet->setCellValue('AB' . $row, $item->Dusun_Letak_Tanah);
            $sheet->setCellValue('AC' . $row, $item->Desa_Letak_Tanah);
            $sheet->setCellValue('AD' . $row, $item->Kec_Letak_Tanah);
            $sheet->setCellValue('AE' . $row, $item->Tahun_C);
            $sheet->setCellValue('AF' . $row, $item->No_C);
            $sheet->setCellValue('AG' . $row, $item->No_Persil);
            $sheet->setCellValue('AH' . $row, $item->Kelas);
            $sheet->setCellValue('AI' . $row, $item->Status_Tanah);
            $sheet->setCellValue('AJ' . $row, $item->Status_Penggunaan);
            $sheet->setCellValue('AK' . $row, $item->Luas_Permohonan);
            $sheet->setCellValue('AL' . $row, $item->Batas_Utara);
            $sheet->setCellValue('AM' . $row, $item->Batas_Timur);
            $sheet->setCellValue('AN' . $row, $item->Batas_Selatan);
            $sheet->setCellValue('AO' . $row, $item->Batas_Barat);
            $sheet->setCellValue('AP' . $row, $item->Tahun_Peralihan_1);
            $sheet->setCellValue('AQ' . $row, $item->Peralihan_1_Kepada);
            $sheet->setCellValue('AR' . $row, $item->Tahun_Peralihan_2);
            $sheet->setCellValue('AS' . $row, $item->Peralihan_2_Kepada);
            $sheet->setCellValue('AT' . $row, $item->Sebab_Peralihan_2);
            $sheet->setCellValue('AU' . $row, $item->Dasar_Peralihan_2);
            $sheet->setCellValue('AV' . $row, $item->Pemilik_Sebelumnya);
            $sheet->setCellValue('AW' . $row, $item->Tahun_Perolehan_Terakhir);
            $sheet->setCellValue('AX' . $row, $item->Sebab_Peralihan_Terkahir);
            $sheet->setCellValue('AY' . $row, $item->Nama_Perolehan_Terakhir);
            $sheet->setCellValue('AZ' . $row, $item->Pemberi_Waris);
            $sheet->setCellValue('BA' . $row, $item->Tahun_Meninggal);
            $sheet->setCellValue('BB' . $row, $item->Bukti_Waris);
            $sheet->setCellValue('BC' . $row, $item->Bukti_Jual_Beli);
            $sheet->setCellValue('BD' . $row, $item->Bukti_Hibah);
            $sheet->setCellValue('BE' . $row, $item->Alas_Hak_Bukti_Perolehan);
            $sheet->setCellValue('BF' . $row, $item->Nama_Kades);
            $sheet->setCellValue('BG' . $row, $item->Nama_Saksi_1);
            $sheet->setCellValueExplicit('BH' . $row, $item->NIK_Saksi_1, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
            $sheet->setCellValue('BI' . $row, $item->Agama_Saksi_1);
            $sheet->setCellValue('BJ' . $row, $item->Usia_Saksi_1);
            $sheet->setCellValue('BK' . $row, $item->Pekerjaan_Saksi_1);
            $sheet->setCellValue('BL' . $row, $item->Alamat_Saksi_1);
            $sheet->setCellValue('BM' . $row, $item->Nama_Saksi_2);
            $sheet->setCellValueExplicit('BN' . $row, $item->NIK_Saksi_2, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
            $sheet->setCellValue('BO' . $row, $item->Agama_Saksi_2);
            $sheet->setCellValue('BP' . $row, $item->Usia_Saksi_2);
            $sheet->setCellValue('BQ' . $row, $item->Pekerjaan_Saksi_2);
            $sheet->setCellValue('BR' . $row, $item->Alamat_Saksi_2);
            $sheet->setCellValue('BS' . $row, $item->Koordinator);


            $row++;
        }

        // Simpan file excel
        $writer = new Xlsx($spreadsheet);
        $writer->save('Nominatif Pendaftaran PTSL Desa Mundurejo.xlsx');

        // Download file excel
        return response()->download(public_path('Nominatif Pendaftaran PTSL Desa Mundurejo.xlsx'))->deleteFileAfterSend(true);
    }

    public function downloadExcelSidomekar()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Ambil data dari database
        $data = Sidomekar::select('*')->get();

        // Tulis header kolom pada file excel
        $sheet->setCellValue('A1', 'No Nominatif');
        $sheet->setCellValue('B1', 'Blok');
        $sheet->setCellValue('C1', 'No SPPT');
        $sheet->setCellValue('D1', 'Tanggal Pendataan');
        $sheet->setCellValue('E1', 'PBT');
        $sheet->setCellValue('F1', 'No Berkas');
        $sheet->setCellValue('G1', 'NUB');
        $sheet->setCellValue('H1', 'NIB');
        $sheet->setCellValue('I1', 'Luas Ukur');
        $sheet->setCellValue('J1', 'Beda Luas');
        $sheet->setCellValue('K1', 'Selisih Luas');
        $sheet->setCellValue('L1', 'No KTP NIK');
        $sheet->setCellValue('M1', 'Nama');
        $sheet->setCellValue('N1', 'Tempat Lahir');
        $sheet->setCellValue('O1', 'Tanggal Lahir');
        $sheet->setCellValue('P1', 'Usia');
        $sheet->setCellValue('Q1', 'Alamat Pemilik');
        $sheet->setCellValue('R1', 'Agama');
        $sheet->setCellValue('S1', 'Pekerjaan');
        $sheet->setCellValue('T1', 'An No KTP NIK');
        $sheet->setCellValue('U1', 'An Nama');
        $sheet->setCellValue('V1', 'An Tempat Lahir');
        $sheet->setCellValue('W1', 'An Tanggal Lahir');
        $sheet->setCellValue('X1', 'An Usia');
        $sheet->setCellValue('Y1', 'An Alamat Pemilik');
        $sheet->setCellValue('Z1', 'RT Letak Tanah');
        $sheet->setCellValue('AA1', 'RW Letak Tanah');
        $sheet->setCellValue('AB1', 'Dusun Letak Tanah');
        $sheet->setCellValue('AC1', 'Desa Letak Tanah');
        $sheet->setCellValue('AD1', 'Kec Letak Tanah');
        $sheet->setCellValue('AE1', 'Tahun C');
        $sheet->setCellValue('AF1', 'No C');
        $sheet->setCellValue('AG1', 'No Persil');
        $sheet->setCellValue('AH1', 'Kelas');
        $sheet->setCellValue('AI1', 'Status Tanah');
        $sheet->setCellValue('AJ1', 'Status Penggunaan');
        $sheet->setCellValue('AK1', 'Luas Permohonan');
        $sheet->setCellValue('AL1', 'Batas Utara');
        $sheet->setCellValue('AM1', 'Batas Timur');
        $sheet->setCellValue('AN1', 'Batas Selatan');
        $sheet->setCellValue('AO1', 'Batas Barat');
        $sheet->setCellValue('AP1', 'Tahun Peralihan 1');
        $sheet->setCellValue('AQ1', 'Peralihan 1 Kepada');
        $sheet->setCellValue('AR1', 'Tahun Peralihan 2');
        $sheet->setCellValue('AS1', 'Peralihan 2 Kepada');
        $sheet->setCellValue('AT1', 'Sebab Peralihan 2');
        $sheet->setCellValue('AU1', 'Dasar Peralihan 2');
        $sheet->setCellValue('AV1', 'Pemilik Sebelumnya');
        $sheet->setCellValue('AW1', 'Tahun Perolehan Terakhir');
        $sheet->setCellValue('AX1', 'Sebab Peralihan Terkahir');
        $sheet->setCellValue('AY1', 'Nama Perolehan Terakhir');
        $sheet->setCellValue('AZ1', 'Pemberi Waris');
        $sheet->setCellValue('BA1', 'Tahun Meninggal');
        $sheet->setCellValue('BB1', 'Bukti Waris');
        $sheet->setCellValue('BC1', 'Bukti Jual Beli');
        $sheet->setCellValue('BD1', 'Bukti Hibah');
        $sheet->setCellValue('BE1', 'Alas Hak Bukti Perolehan');
        $sheet->setCellValue('BF1', 'Nama Kades');
        $sheet->setCellValue('BG1', 'Nama Saksi 1');
        $sheet->setCellValue('BH1', 'NIK Saksi 1');
        $sheet->setCellValue('BI1', 'Agama Saksi 1');
        $sheet->setCellValue('BJ1', 'Usia Saksi 1');
        $sheet->setCellValue('BK1', 'Pekerjaan Saksi 1');
        $sheet->setCellValue('BL1', 'Alamat Saksi 1');
        $sheet->setCellValue('BM1', 'Nama Saksi 2');
        $sheet->setCellValue('BN1', 'NIK Saksi 2');
        $sheet->setCellValue('BO1', 'Agama Saksi 2');
        $sheet->setCellValue('BP1', 'Usia Saksi 2');
        $sheet->setCellValue('BQ1', 'Pekerjaan Saksi 2');
        $sheet->setCellValue('BR1', 'Alamat Saksi 2');
        $sheet->setCellValue('BS1', 'Koordinator');

        // Tulis data pada file excel
        $row = 2;
        foreach ($data as $item) {
            $sheet->setCellValue('A' . $row, $item->id);
            $sheet->setCellValue('B' . $row, $item->Blok);
            $sheet->setCellValue('C' . $row, $item->No_SPPT);
            $sheet->setCellValue('D' . $row, Carbon::createFromFormat('Y-m-d', $item->Tgl_Pendataan)->format('d-m-Y'));
            $sheet->setCellValue('E' . $row, $item->PBT);
            $sheet->setCellValue('F' . $row, $item->No_Berkas);
            $sheet->setCellValue('G' . $row, $item->NUB);
            $sheet->setCellValue('H' . $row, $item->NIB);
            $sheet->setCellValue('I' . $row, $item->Luas_Ukur);
            $sheet->setCellValue('J' . $row, $item->Beda_Luas);
            $sheet->setCellValue('K' . $row, $item->Selisih_Luas);
            $sheet->setCellValueExplicit('L' . $row, $item->No_KTP_NIK, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
            $sheet->setCellValue('M' . $row, $item->Nama);
            $sheet->setCellValue('N' . $row, $item->Tempat_Lahir);
            $sheet->setCellValue('O' . $row, Carbon::createFromFormat('Y-m-d', $item->Tanggal_Lahir)->format('d-m-Y'));
            $sheet->setCellValue('P' . $row, $item->Usia);
            $sheet->setCellValue('Q' . $row, $item->Alamat_Pemilik);
            $sheet->setCellValue('R' . $row, $item->Agama);
            $sheet->setCellValue('S' . $row, $item->Pekerjaan);
            $sheet->setCellValueExplicit('T' . $row, $item->An_No_KTP_NIK, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
            $sheet->setCellValue('U' . $row, $item->An_Nama);
            $sheet->setCellValue('V' . $row, $item->An_Tempat_Lahir);
            $sheet->setCellValue('W' . $row, Carbon::createFromFormat('Y-m-d', $item->An_Tanggal_Lahir)->format('d-m-Y'));
            $sheet->setCellValue('X' . $row, $item->An_Usia);
            $sheet->setCellValue('Y' . $row, $item->An_Alamat_Pemilik);
            $sheet->setCellValue('Z' . $row, $item->RT_Letak_Tanah);
            $sheet->setCellValue('AA' . $row, $item->RW_Letak_Tanah);
            $sheet->setCellValue('AB' . $row, $item->Dusun_Letak_Tanah);
            $sheet->setCellValue('AC' . $row, $item->Desa_Letak_Tanah);
            $sheet->setCellValue('AD' . $row, $item->Kec_Letak_Tanah);
            $sheet->setCellValue('AE' . $row, $item->Tahun_C);
            $sheet->setCellValue('AF' . $row, $item->No_C);
            $sheet->setCellValue('AG' . $row, $item->No_Persil);
            $sheet->setCellValue('AH' . $row, $item->Kelas);
            $sheet->setCellValue('AI' . $row, $item->Status_Tanah);
            $sheet->setCellValue('AJ' . $row, $item->Status_Penggunaan);
            $sheet->setCellValue('AK' . $row, $item->Luas_Permohonan);
            $sheet->setCellValue('AL' . $row, $item->Batas_Utara);
            $sheet->setCellValue('AM' . $row, $item->Batas_Timur);
            $sheet->setCellValue('AN' . $row, $item->Batas_Selatan);
            $sheet->setCellValue('AO' . $row, $item->Batas_Barat);
            $sheet->setCellValue('AP' . $row, $item->Tahun_Peralihan_1);
            $sheet->setCellValue('AQ' . $row, $item->Peralihan_1_Kepada);
            $sheet->setCellValue('AR' . $row, $item->Tahun_Peralihan_2);
            $sheet->setCellValue('AS' . $row, $item->Peralihan_2_Kepada);
            $sheet->setCellValue('AT' . $row, $item->Sebab_Peralihan_2);
            $sheet->setCellValue('AU' . $row, $item->Dasar_Peralihan_2);
            $sheet->setCellValue('AV' . $row, $item->Pemilik_Sebelumnya);
            $sheet->setCellValue('AW' . $row, $item->Tahun_Perolehan_Terakhir);
            $sheet->setCellValue('AX' . $row, $item->Sebab_Peralihan_Terkahir);
            $sheet->setCellValue('AY' . $row, $item->Nama_Perolehan_Terakhir);
            $sheet->setCellValue('AZ' . $row, $item->Pemberi_Waris);
            $sheet->setCellValue('BA' . $row, $item->Tahun_Meninggal);
            $sheet->setCellValue('BB' . $row, $item->Bukti_Waris);
            $sheet->setCellValue('BC' . $row, $item->Bukti_Jual_Beli);
            $sheet->setCellValue('BD' . $row, $item->Bukti_Hibah);
            $sheet->setCellValue('BE' . $row, $item->Alas_Hak_Bukti_Perolehan);
            $sheet->setCellValue('BF' . $row, $item->Nama_Kades);
            $sheet->setCellValue('BG' . $row, $item->Nama_Saksi_1);
            $sheet->setCellValueExplicit('BH' . $row, $item->NIK_Saksi_1, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
            $sheet->setCellValue('BI' . $row, $item->Agama_Saksi_1);
            $sheet->setCellValue('BJ' . $row, $item->Usia_Saksi_1);
            $sheet->setCellValue('BK' . $row, $item->Pekerjaan_Saksi_1);
            $sheet->setCellValue('BL' . $row, $item->Alamat_Saksi_1);
            $sheet->setCellValue('BM' . $row, $item->Nama_Saksi_2);
            $sheet->setCellValueExplicit('BN' . $row, $item->NIK_Saksi_2, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
            $sheet->setCellValue('BO' . $row, $item->Agama_Saksi_2);
            $sheet->setCellValue('BP' . $row, $item->Usia_Saksi_2);
            $sheet->setCellValue('BQ' . $row, $item->Pekerjaan_Saksi_2);
            $sheet->setCellValue('BR' . $row, $item->Alamat_Saksi_2);
            $sheet->setCellValue('BS' . $row, $item->Koordinator);


            $row++;
        }

        // Simpan file excel
        $writer = new Xlsx($spreadsheet);
        $writer->save('Nominatif Pendaftaran PTSL Desa Sidomekar.xlsx');

        // Download file excel
        return response()->download(public_path('Nominatif Pendaftaran PTSL Desa Sidomekar.xlsx'))->deleteFileAfterSend(true);
    }

    public function exportMundurejo($No_Nominatif)
    {
        $data = Mundurejo::find($No_Nominatif);
        $phpWord = new \PhpOffice\PhpWord\TemplateProcessor('berkas.docx');
        if($data->No_KTP_NIK == $data->An_No_KTP_NIK){
            $bertindak = "untuk diri sendiri";
        } else {
            $bertindak = "selaku kuasa";
        }
        if($data->Sebab_Peralihan_Terakhir == "JUAL BELI"){
            $Tahun_Menjual = $data->Tahun_Perolehan_Terakhir;
            $Nama_Penjual = $data->Peralihan_2_Kepada;
        } else if($data->Sebab_Peralihan_2 == "JUAL BELI"){
            $Tahun_Menjual = $data->Tahun_Peralihan_2;
            $Nama_Penjual = $data->Peralihan_1_Kepada;
        } else {
            $Tahun_Menjual = "....";
            $Nama_Penjual = null;
        }

        //handle tanggal
        if($data->Tgl_Pendataan != ""){
            $Tgl_Pendataan = Carbon::createFromFormat('Y-m-d', $data->Tgl_Pendataan)->format('d-m-Y');
        } else{
            $Tgl_Pendataan = null;
        }
        if($data->Tanggal_Lahir != ""){
            $Tanggal_Lahir = Carbon::createFromFormat('Y-m-d', $data->Tgl_Pendataan)->format('d-m-Y');
        } else{
            $Tanggal_Lahir = null;
        }
        if($data->An_Tanggal_Lahir != ""){
            $An_Tanggal_Lahir = Carbon::createFromFormat('Y-m-d', $data->An_Tanggal_Lahir)->format('d-m-Y');
        } else{
            $An_Tanggal_Lahir = null;
        }
        
        $phpWord->setValues([
            'id' => $data->id,
            'Blok' => $data->Blok,
            'No_SPPT' => $data->No_SPPT,
            'Tgl_Pendataan' => $Tgl_Pendataan,
            'PBT' => $data->PBT,
            'No_Berkas' => $data->No_Berkas,
            'NUB' => $data->NUB,
            'NIB' => $data->NIB,
            'Luas_Ukur' => $data->Luas_Ukur,
            'Beda_Luas' => $data->Beda_Luas,

            'Bertindak' => $bertindak,

            'No_KTP_NIK' => $data->No_KTP_NIK,
            'Nama' => $data->Nama,
            'Tempat_Lahir' => $data->Tempat_Lahir,
            'Tanggal_Lahir' => $Tanggal_Lahir,
            'Usia' => $data->Usia,
            'Alamat_Pemilik' => $data->Alamat_Pemilik,
            'Agama' => $data->Agama,
            'Pekerjaan' => $data->Pekerjaan,

            'An_No_KTP_NIK' => $data->An_No_KTP_NIK,
            'An_Nama' => $data->An_Nama,
            'An_Tempat_Lahir' => $data->An_Tempat_Lahir,
            'An_Tanggal_Lahir' => $An_Tanggal_Lahir ,
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
            'Nama_Penjual' => $Nama_Penjual,
            'Tahun_Menjual' => $Tahun_Menjual       
        ]);

        $phpWord->saveAs( $data->id. ' - '. $data->Nama. '.docx');
        return response()->download(public_path( $data->id. ' - '. $data->Nama. '.docx'))->deleteFileAfterSend(true);
    }

    public function exportPondokjoyo($No_Nominatif)
    {
        $data = Pondokjoyo::find($No_Nominatif);
        $phpWord = new \PhpOffice\PhpWord\TemplateProcessor('berkas.docx');
        if($data->No_KTP_NIK == $data->An_No_KTP_NIK){
            $bertindak = "untuk diri sendiri";
        } else {
            $bertindak = "selaku kuasa";
        }
        if($data->Sebab_Peralihan_Terakhir == "JUAL BELI"){
            $Tahun_Menjual = $data->Tahun_Perolehan_Terakhir;
            $Nama_Penjual = $data->Peralihan_2_Kepada;
        } else if($data->Sebab_Peralihan_2 == "JUAL BELI"){
            $Tahun_Menjual = $data->Tahun_Peralihan_2;
            $Nama_Penjual = $data->Peralihan_1_Kepada;
        } else {
            $Tahun_Menjual = "....";
            $Nama_Penjual = null;
        }

        if($data->Tgl_Pendataan != ""){
            $Tgl_Pendataan = Carbon::createFromFormat('Y-m-d', $data->Tgl_Pendataan)->format('d-m-Y');
        } else{
            $Tgl_Pendataan = null;
        }
        if($data->Tanggal_Lahir != ""){
            $Tanggal_Lahir = Carbon::createFromFormat('Y-m-d', $data->Tgl_Pendataan)->format('d-m-Y');
        } else{
            $Tanggal_Lahir = null;
        }
        if($data->An_Tanggal_Lahir != ""){
            $An_Tanggal_Lahir = Carbon::createFromFormat('Y-m-d', $data->An_Tanggal_Lahir)->format('d-m-Y');
        } else{
            $An_Tanggal_Lahir = null;
        }
        
        $phpWord->setValues([
            'id' => $data->id,
            'Blok' => $data->Blok,
            'No_SPPT' => $data->No_SPPT,
            'Tgl_Pendataan' => $Tgl_Pendataan,
            'PBT' => $data->PBT,
            'No_Berkas' => $data->No_Berkas,
            'NUB' => $data->NUB,
            'NIB' => $data->NIB,
            'Luas_Ukur' => $data->Luas_Ukur,
            'Beda_Luas' => $data->Beda_Luas,

            'Bertindak' => $bertindak,

            'No_KTP_NIK' => $data->No_KTP_NIK,
            'Nama' => $data->Nama,
            'Tempat_Lahir' => $data->Tempat_Lahir,
            'Tanggal_Lahir' => $Tanggal_Lahir,
            'Usia' => $data->Usia,
            'Alamat_Pemilik' => $data->Alamat_Pemilik,
            'Agama' => $data->Agama,
            'Pekerjaan' => $data->Pekerjaan,

            'An_No_KTP_NIK' => $data->An_No_KTP_NIK,
            'An_Nama' => $data->An_Nama,
            'An_Tempat_Lahir' => $data->An_Tempat_Lahir,
            'An_Tanggal_Lahir' => $An_Tanggal_Lahir ,
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
            'Nama_Penjual' => $Nama_Penjual,
            'Tahun_Menjual' => $Tahun_Menjual        
        ]);

        $phpWord->saveAs( $data->id. ' - '. $data->Nama. '.docx');
        return response()->download(public_path( $data->id. ' - '. $data->Nama. '.docx'))->deleteFileAfterSend(true);
    }

    public function exportSidomekar($No_Nominatif)
    {
        $data = Sidomekar::find($No_Nominatif);
        $phpWord = new \PhpOffice\PhpWord\TemplateProcessor('berkas.docx');
        if($data->No_KTP_NIK == $data->An_No_KTP_NIK){
            $bertindak = "untuk diri sendiri";
        } else {
            $bertindak = "selaku kuasa";
        }
        if($data->Sebab_Peralihan_Terakhir == "JUAL BELI"){
            $Tahun_Menjual = $data->Tahun_Perolehan_Terakhir;
            $Nama_Penjual = $data->Peralihan_2_Kepada;
        } else if($data->Sebab_Peralihan_2 == "JUAL BELI"){
            $Tahun_Menjual = $data->Tahun_Peralihan_2;
            $Nama_Penjual = $data->Peralihan_1_Kepada;
        } else {
            $Tahun_Menjual = "....";
            $Nama_Penjual = null;
        }

        if($data->Tgl_Pendataan != ""){
            $Tgl_Pendataan = Carbon::createFromFormat('Y-m-d', $data->Tgl_Pendataan)->format('d-m-Y');
        } else{
            $Tgl_Pendataan = null;
        }
        if($data->Tanggal_Lahir != ""){
            $Tanggal_Lahir = Carbon::createFromFormat('Y-m-d', $data->Tgl_Pendataan)->format('d-m-Y');
        } else{
            $Tanggal_Lahir = null;
        }
        if($data->An_Tanggal_Lahir != ""){
            $An_Tanggal_Lahir = Carbon::createFromFormat('Y-m-d', $data->An_Tanggal_Lahir)->format('d-m-Y');
        } else{
            $An_Tanggal_Lahir = null;
        }
        
        $phpWord->setValues([
            'id' => $data->id,
            'Blok' => $data->Blok,
            'No_SPPT' => $data->No_SPPT,
            'Tgl_Pendataan' => $Tgl_Pendataan,
            'PBT' => $data->PBT,
            'No_Berkas' => $data->No_Berkas,
            'NUB' => $data->NUB,
            'NIB' => $data->NIB,
            'Luas_Ukur' => $data->Luas_Ukur,
            'Beda_Luas' => $data->Beda_Luas,

            'Bertindak' => $bertindak,

            'No_KTP_NIK' => $data->No_KTP_NIK,
            'Nama' => $data->Nama,
            'Tempat_Lahir' => $data->Tempat_Lahir,
            'Tanggal_Lahir' => $Tanggal_Lahir,
            'Usia' => $data->Usia,
            'Alamat_Pemilik' => $data->Alamat_Pemilik,
            'Agama' => $data->Agama,
            'Pekerjaan' => $data->Pekerjaan,

            'An_No_KTP_NIK' => $data->An_No_KTP_NIK,
            'An_Nama' => $data->An_Nama,
            'An_Tempat_Lahir' => $data->An_Tempat_Lahir,
            'An_Tanggal_Lahir' => $An_Tanggal_Lahir ,
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
            'Nama_Penjual' => $Nama_Penjual,
            'Tahun_Menjual' => $Tahun_Menjual     
        ]);

        $phpWord->saveAs( $data->id. ' - '. $data->Nama. '.docx');
        return response()->download(public_path( $data->id. ' - '. $data->Nama. '.docx'))->deleteFileAfterSend(true);
    }
}
