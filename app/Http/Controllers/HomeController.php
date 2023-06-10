<?php

namespace App\Http\Controllers;

use App\Models\Mundurejo;
use App\Models\Sidomekar;
use App\Models\Pondokjoyo;
use App\Models\Sidorejo;
use App\Models\Sumberagung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $koordinator_sidorejo = [];
        $data_koordinator_sidorejo=[];
        //Koordinator Sidorejo
        $koordinator_sidorejo = Sidorejo::select('Nama_Saksi_1')->groupBy('Nama_Saksi_1')->get()->pluck('Nama_Saksi_1')->all();
        $iter = 0;
        while ($iter < DB::table('sidorejo')->select('Nama_Saksi_1')->distinct()->count('Nama_Saksi_1')) {
            $data_koordinator_sidorejo[$iter] = Sidorejo::select('*')->where('Nama_Saksi_1', '=', $koordinator_sidorejo[$iter])->count();
            $iter++;
        }

        //Koordinator Pondok Joyo
        $koordinator_pondokjoyo = Pondokjoyo::select('Nama_Saksi_1')->groupBy('Nama_Saksi_1')->get()->pluck('Nama_Saksi_1')->all();
        $iter = 0;
        while ($iter < DB::table('pondokjoyo')->select('Nama_Saksi_1')->distinct()->count('Nama_Saksi_1')) {
            $data_koordinator_pondokjoyo[$iter] = Pondokjoyo::select('*')->where('Nama_Saksi_1', '=', $koordinator_pondokjoyo[$iter])->count();
            $iter++;
        }

        //Koordinator Mundurejo
        $koordinator_mundurejo = Mundurejo::select('Nama_Saksi_1')->groupBy('Nama_Saksi_1')->get()->pluck('Nama_Saksi_1')->all();
        $iter = 0;
        while ($iter < DB::table('mundurejo')->select('Nama_Saksi_1')->distinct()->count('Nama_Saksi_1')) {
            $data_koordinator_mundurejo[$iter] = Mundurejo::select('*')->where('Nama_Saksi_1', '=', $koordinator_mundurejo[$iter])->count();
            $iter++;
        }

        $nib_sidorejo = Sidorejo::whereNotNull('NIB')->count();
        $nib_mundurejo = Mundurejo::whereNotNull('NIB')->count();
        $nib_pondokjoyo = Pondokjoyo::whereNotNull('NIB')->count();
        $nib_sumberagung = Sumberagung::whereNotNull('NIB')->count();
        $nib_sidomekar = Sidomekar::whereNotNull('NIB')->count();

        $belum_nib_sidorejo = Sidorejo::whereNull('NIB')->count();
        $belum_nib_mundurejo = Mundurejo::whereNull('NIB')->count();
        $belum_nib_pondokjoyo = Pondokjoyo::whereNull('NIB')->count();
        $belum_nib_sumberagung = Sumberagung::whereNull('NIB')->count();
        $belum_nib_sidomekar = Sidomekar::whereNull('NIB')->count();

        return view(
            'home',
            compact([
                'koordinator_sidorejo',
                'data_koordinator_sidorejo',
                'koordinator_pondokjoyo',
                'data_koordinator_pondokjoyo',
                'koordinator_mundurejo',
                'data_koordinator_mundurejo',
                'nib_sidorejo',
                'nib_mundurejo',
                'nib_pondokjoyo',
                'nib_sumberagung',
                'nib_sidomekar',
                'belum_nib_sidorejo',
                'belum_nib_mundurejo',
                'belum_nib_pondokjoyo',
                'belum_nib_sumberagung',
                'belum_nib_sidomekar'
            ])
        );
    }
}
