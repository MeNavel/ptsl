<?php

namespace App\Http\Controllers;

use App\Models\Mundurejo;
use App\Models\Sidomekar;
use App\Models\Pondokjoyo;
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
        $data_dusun_pondokjoyo[] = null;
        $data_dusun_mundurejo[] = null;
        $data_dusun_sumberagung[] = null;
        $data_dusun_sidomekar[] = null;
        $data_koordinator_pondokjoyo[] = null;
        $data_koordinator_mundurejo[] = null;
        //Desa Pondok Joyo
        $dusun_pondokjoyo = Pondokjoyo::select('Dusun_Letak_Tanah')->groupBy('Dusun_Letak_Tanah')->get()->pluck('Dusun_Letak_Tanah')->all();
        $iter = 0;
        while ($iter < DB::table('pondokjoyo')->select('Dusun_Letak_Tanah')->distinct()->count('Dusun_Letak_Tanah')) {
            $data_dusun_pondokjoyo[$iter] = Pondokjoyo::select('*')->where('Dusun_Letak_Tanah', '=', $dusun_pondokjoyo[$iter])->count();
            $iter++;
        }

        //Desa Mundurejo
        $dusun_mundurejo = Mundurejo::select('Dusun_Letak_Tanah')->groupBy('Dusun_Letak_Tanah')->get()->pluck('Dusun_Letak_Tanah')->all();
        $iter = 0;
        while ($iter < DB::table('mundurejo')->select('Dusun_Letak_Tanah')->distinct()->count('Dusun_Letak_Tanah')) {
            $data_dusun_mundurejo[$iter] = Mundurejo::select('*')->where('Dusun_Letak_Tanah', '=', $dusun_mundurejo[$iter])->count();
            $iter++;
        }
        // $all = $dusun_mundurejo->merge($data_dusun_mundurejo);
        // dd(array_merge($dusun_mundurejo,$data_dusun_mundurejo));

        //Desa Sumberagung
        $dusun_sumberagung = Sumberagung::select('Dusun_Letak_Tanah')->groupBy('Dusun_Letak_Tanah')->get()->pluck('Dusun_Letak_Tanah')->all();
        $iter = 0;
        while ($iter < DB::table('sumberagung')->select('Dusun_Letak_Tanah')->distinct()->count('Dusun_Letak_Tanah')) {
            $data_dusun_sumberagung[$iter] = Sumberagung::select('*')->where('Dusun_Letak_Tanah', '=', $dusun_sumberagung[$iter])->count();
            $iter++;
        }

        //Desa Sidomekar
        $dusun_sidomekar = Sidomekar::select('Dusun_Letak_Tanah')->groupBy('Dusun_Letak_Tanah')->get()->pluck('Dusun_Letak_Tanah')->all();
        $iter = 0;
        while ($iter < DB::table('sidomekar')->select('Dusun_Letak_Tanah')->distinct()->count('Dusun_Letak_Tanah')) {
            $data_dusun_sidomekar[$iter] = Sidomekar::select('*')->where('Dusun_Letak_Tanah', '=', $dusun_sidomekar[$iter])->count();
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

        $nib_mundurejo = Mundurejo::whereNotNull('NIB')->count();
        $nib_pondokjoyo = Pondokjoyo::whereNotNull('NIB')->count();
        $nib_sumberagung = Sumberagung::whereNotNull('NIB')->count();
        $nib_sidomekar = Sidomekar::whereNotNull('NIB')->count();

        $belum_nib_mundurejo = Mundurejo::whereNull('NIB')->count();
        $belum_nib_pondokjoyo = Pondokjoyo::whereNull('NIB')->count();
        $belum_nib_sumberagung = Sumberagung::whereNull('NIB')->count();
        $belum_nib_sidomekar = Sidomekar::whereNull('NIB')->count();

        return view(
            'home',
            compact([
                'dusun_pondokjoyo',
                'data_dusun_pondokjoyo',
                'dusun_mundurejo',
                'data_dusun_mundurejo',
                'dusun_sumberagung',
                'data_dusun_sumberagung',
                'dusun_sidomekar',
                'data_dusun_sidomekar',
                'koordinator_pondokjoyo',
                'data_koordinator_pondokjoyo',
                'koordinator_mundurejo',
                'data_koordinator_mundurejo',
                'nib_mundurejo',
                'nib_pondokjoyo',
                'nib_sumberagung',
                'nib_sidomekar',
                'belum_nib_mundurejo',
                'belum_nib_pondokjoyo',
                'belum_nib_sumberagung',
                'belum_nib_sidomekar'
            ])
        );
    }
}
