<?php

namespace App\Http\Controllers;

use App\DataPenduduk;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index () {
        $this_year = Carbon::now()->format('Y');
        $chart = DataPenduduk::where('created_at', 'like', $this_year . '%')->get();
        $gender_laki = DataPenduduk::where('gender', 'like', '%Laki-laki%')->count();
        $gender_cewe = DataPenduduk::where('gender', 'like', '%Perempuan%')->count();
        $dewasa = DataPenduduk::where('usia', '>=', '17')->count();
        $anak_anak = DataPenduduk::where('usia', '<', '17')->count();

        for ($i = 1; $i <= 12; $i++) {
            $data_month[(int)$i] = 0;
        }
        foreach ($chart as $c) {
            $check = explode('-', $c->created_at)[1];
            $data_month[(int)$check] += 1;
        }
        // dd($data_month);




        return view('dashboard', compact('data_month', 'gender_laki', 'gender_cewe', 'dewasa', 'anak_anak'));
    }
}
