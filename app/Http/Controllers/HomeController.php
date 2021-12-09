<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use DB;

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
        $produks = DB::table('produk')
                ->selectRaw('jenis_kode, jenis.nama as jenis_nama, count(jenis_kode) as jumlah')
                ->join('jenis', 'jenis.kode', 'produk.jenis_kode')
                ->groupBy('jenis_kode')
                ->groupBy('jenis_nama')
                ->get();
        return view('home', ['produks' => $produks]);
    }
}