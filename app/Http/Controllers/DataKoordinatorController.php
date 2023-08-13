<?php

namespace App\Http\Controllers;

use App\Models\Sidomulyo;
use App\Models\Sidorejo;
use Carbon\Carbon;
use App\Models\Mundurejo;
use App\Models\Pondokjoyo;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class DataKoordinatorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dataKoordinatorSidomulyo()
    {
        $spreadsheet = new Spreadsheet();

        // Ambil data dari database
        $koordinator = Sidomulyo::select('Nama_Saksi_1')->groupBy('Nama_Saksi_1')->get()->pluck('Nama_Saksi_1')->all();
        $iter = 0;
        while ($iter < Sidomulyo::select('Nama_Saksi_1')->distinct()->count('Nama_Saksi_1')) {

            $spreadsheet->createSheet();
            $sheet = $spreadsheet->setActiveSheetIndex($iter);
            $spreadsheet->getActiveSheet()->setTitle($koordinator[$iter]);

            // Tulis header kolom pada file excel
            $sheet->setCellValue('A1', 'No Nominatif');
            $sheet->setCellValue('B1', 'Tanggal Pendataan');
            $sheet->setCellValue('C1', 'Nama');
            $sheet->setCellValue('D1', 'Koordinator');


            $data = Sidomulyo::select('*')->where('Nama_Saksi_1', $koordinator[$iter])->get();
            // dd($data);
            $row = 2;
            foreach ($data as $item) {
                if ($item->Tgl_Pendataan != "") {
                    $Tgl_Pendataan = Carbon::createFromFormat('Y-m-d', $item->Tgl_Pendataan)->format('d-m-Y');
                } else {
                    $Tgl_Pendataan = null;
                }
                $sheet->setCellValue('A' . $row, $item->id);
                $sheet->setCellValue('B' . $row, $Tgl_Pendataan);
                $sheet->setCellValue('C' . $row, $item->An_Nama);
                $sheet->setCellValue('D' . $row, $item->Nama_Saksi_1);
                $row++;
            }
            $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(TRUE);
            $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(TRUE);
            $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(TRUE);
            $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(TRUE);
            $iter++;
        }
        $spreadsheet->removeSheetByIndex(Sidomulyo::select('Nama_Saksi_1')->distinct()->count('Nama_Saksi_1'));
        // Simpan file excel
        $writer = new Xlsx($spreadsheet);
        $writer->save('Data Pendaftar Setiap Koordinator Sidomulyo.xlsx');

        // Download file excel
        return response()->download(public_path('Data Pendaftar Setiap Koordinator Sidomulyo.xlsx'))->deleteFileAfterSend(true);
    }

    public function dataKoordinatorSidorejo()
    {
        $spreadsheet = new Spreadsheet();

        // Ambil data dari database
        $koordinator = Sidorejo::select('Nama_Saksi_1')->groupBy('Nama_Saksi_1')->get()->pluck('Nama_Saksi_1')->all();
        $iter = 0;
        while ($iter < Sidorejo::select('Nama_Saksi_1')->distinct()->count('Nama_Saksi_1')) {

            $spreadsheet->createSheet();
            $sheet = $spreadsheet->setActiveSheetIndex($iter);
            $spreadsheet->getActiveSheet()->setTitle($koordinator[$iter]);

            // Tulis header kolom pada file excel
            $sheet->setCellValue('A1', 'No Nominatif');
            $sheet->setCellValue('B1', 'Tanggal Pendataan');
            $sheet->setCellValue('C1', 'Nama');
            $sheet->setCellValue('D1', 'Koordinator');


            $data = Sidorejo::select('*')->where('Nama_Saksi_1', $koordinator[$iter])->get();
            // dd($data);
            $row = 2;
            foreach ($data as $item) {
                if ($item->Tgl_Pendataan != "") {
                    $Tgl_Pendataan = Carbon::createFromFormat('Y-m-d', $item->Tgl_Pendataan)->format('d-m-Y');
                } else {
                    $Tgl_Pendataan = null;
                }
                $sheet->setCellValue('A' . $row, $item->id);
                $sheet->setCellValue('B' . $row, $Tgl_Pendataan);
                $sheet->setCellValue('C' . $row, $item->An_Nama);
                $sheet->setCellValue('D' . $row, $item->Nama_Saksi_1);
                $row++;
            }
            $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(TRUE);
            $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(TRUE);
            $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(TRUE);
            $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(TRUE);
            $iter++;
        }
        $spreadsheet->removeSheetByIndex(Sidorejo::select('Nama_Saksi_1')->distinct()->count('Nama_Saksi_1'));
        // Simpan file excel
        $writer = new Xlsx($spreadsheet);
        $writer->save('Data Pendaftar Setiap Koordinator Sidorejo.xlsx');

        // Download file excel
        return response()->download(public_path('Data Pendaftar Setiap Koordinator Sidorejo.xlsx'))->deleteFileAfterSend(true);
    }

    public function dataKoordinatorMundurejo()
    {
        $spreadsheet = new Spreadsheet();

        // Ambil data dari database
        $koordinator = Mundurejo::select('Nama_Saksi_1')->groupBy('Nama_Saksi_1')->get()->pluck('Nama_Saksi_1')->all();
        $iter = 0;
        while ($iter < Mundurejo::select('Nama_Saksi_1')->distinct()->count('Nama_Saksi_1')) {

            $spreadsheet->createSheet();
            $sheet = $spreadsheet->setActiveSheetIndex($iter);
            $spreadsheet->getActiveSheet()->setTitle($koordinator[$iter]);

            // Tulis header kolom pada file excel
            $sheet->setCellValue('A1', 'No Nominatif');
            $sheet->setCellValue('B1', 'Tanggal Pendataan');
            $sheet->setCellValue('C1', 'Nama');
            $sheet->setCellValue('D1', 'Koordinator');


            $data = Mundurejo::select('*')->where('Nama_Saksi_1', $koordinator[$iter])->get();
            // dd($data);
            $row = 2;
            foreach ($data as $item) {
                if ($item->Tgl_Pendataan != "") {
                    $Tgl_Pendataan = Carbon::createFromFormat('Y-m-d', $item->Tgl_Pendataan)->format('d-m-Y');
                } else {
                    $Tgl_Pendataan = null;
                }
                $sheet->setCellValue('A' . $row, $item->id);
                $sheet->setCellValue('B' . $row, $Tgl_Pendataan);
                $sheet->setCellValue('C' . $row, $item->An_Nama);
                $sheet->setCellValue('D' . $row, $item->Nama_Saksi_1);
                $row++;
            }
            $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(TRUE);
            $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(TRUE);
            $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(TRUE);
            $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(TRUE);
            $iter++;
        }
        $spreadsheet->removeSheetByIndex(Mundurejo::select('Nama_Saksi_1')->distinct()->count('Nama_Saksi_1'));
        // Simpan file excel
        $writer = new Xlsx($spreadsheet);
        $writer->save('Data Pendaftar Setiap Koordinator Mundurejo.xlsx');

        // Download file excel
        return response()->download(public_path('Data Pendaftar Setiap Koordinator Mundurejo.xlsx'))->deleteFileAfterSend(true);
    }

    public function dataKoordinatorPondokjoyo()
    {
        $spreadsheet = new Spreadsheet();

        // Ambil data dari database
        $koordinator = Pondokjoyo::select('Nama_Saksi_1')->groupBy('Nama_Saksi_1')->get()->pluck('Nama_Saksi_1')->all();
        $iter = 0;
        while ($iter < Pondokjoyo::select('Nama_Saksi_1')->distinct()->count('Nama_Saksi_1')) {

            $spreadsheet->createSheet();
            $sheet = $spreadsheet->setActiveSheetIndex($iter);
            $spreadsheet->getActiveSheet()->setTitle($koordinator[$iter]);

            // Tulis header kolom pada file excel
            $sheet->setCellValue('A1', 'No Nominatif');
            $sheet->setCellValue('B1', 'Tanggal Pendataan');
            $sheet->setCellValue('C1', 'Nama');
            $sheet->setCellValue('D1', 'Koordinator');


            $data = Pondokjoyo::select('*')->where('Nama_Saksi_1', $koordinator[$iter])->get();
            // dd($data);
            $row = 2;
            foreach ($data as $item) {
                if ($item->Tgl_Pendataan != "") {
                    $Tgl_Pendataan = Carbon::createFromFormat('Y-m-d', $item->Tgl_Pendataan)->format('d-m-Y');
                } else {
                    $Tgl_Pendataan = null;
                }
                $sheet->setCellValue('A' . $row, $item->id);
                $sheet->setCellValue('B' . $row, $Tgl_Pendataan);
                $sheet->setCellValue('C' . $row, $item->An_Nama);
                $sheet->setCellValue('D' . $row, $item->Nama_Saksi_1);
                $row++;
            }
            $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(TRUE);
            $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(TRUE);
            $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(TRUE);
            $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(TRUE);
            $iter++;
        }
        $spreadsheet->removeSheetByIndex(Pondokjoyo::select('Nama_Saksi_1')->distinct()->count('Nama_Saksi_1'));
        // Simpan file excel
        $writer = new Xlsx($spreadsheet);
        $writer->save('Data Pendaftar Setiap Koordinator Pondokjoyo.xlsx');

        // Download file excel
        return response()->download(public_path('Data Pendaftar Setiap Koordinator Pondokjoyo.xlsx'))->deleteFileAfterSend(true);
    }
}
