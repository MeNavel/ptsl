<?php

namespace App\Http\Controllers;

use App\Models\Koordinator;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class KoordinatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('only.id.one');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Koordinator::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return '<div class="btn-group">
                                <a class="btn btn-info" href="' . route('edit-koordinator', $row->id) . '" role="button"><i class="bi bi-info-circle"></i></a>
                                <button class="btn btn-danger delete-btn" data-id="' . $row->id . '"><i class="bi-trash3"></i></button>
                            </div>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('koordinator.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('koordinator.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Koordinator;

        $data->nik = $request->NIK;
        $data->nama = $request->Nama;
        $data->agama = $request->Agama;
        $data->usia = $request->Usia;
        $data->pekerjaan = $request->Pekerjaan;
        $data->alamat = $request->Alamat;
        $data->dusun = $request->Dusun;
        $data->desa = $request->Desa;
        $data->status = $request->Status;
        $data->jabatan = $request->Jabatan;
        $data->save();
        return view('koordinator.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Koordinator  $koordinator
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Koordinator::find($id);
        return view('koordinator.edit', compact(['data']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Koordinator  $koordinator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Koordinator::find($id);
        $data->nik = $request->get('NIK');
        $data->nama = $request->get('Nama');
        $data->agama = $request->get('Agama');
        $data->usia = $request->get('Usia');
        $data->pekerjaan = $request->get('Pekerjaan');
        $data->alamat = $request->get('Alamat');
        $data->dusun = $request->get('Dusun');
        $data->desa = $request->get('Desa');
        $data->status = $request->get('Status');
        $data->jabatan = $request->get('Jabatan');
        $data->save();
        return view('koordinator.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Koordinator  $koordinator
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Koordinator::find($id);
        if ($data) {
            $data->delete();
            return response()->json(['success' => 'Data Deleted Successfully']);
        };
    }
}
