<?php

namespace App\Http\Controllers;
use App\Models\Jenis;
use App\Models\Produk;

use Illuminate\Http\Request;

class JenisController extends Controller
{
    public function index()
    {
        $jenis = Jenis::all();
        // $jenis = Menu::select('kode', 'kode_berkas', 'nama')->get();
        return view('jenis.tampil', ['jenis' => $jenis]);
    }

    public function create()
    {
        return view('jenis.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required',
            'kode_berkas' => 'required',
            'nama' => 'required',
        ]);
        $array = $request->only([
            'kode', 'kode_berkas', 'nama', 'keterangan'
        ]);
        $user = Jenis::create($array);
        return redirect()->route('jenis.index')
            ->with('success_message', 'Berhasil menambah Produk Baru');
    }

    public function edit($id)
    {
        $jenis = Jenis::find($id);
        if (!$jenis) return redirect()->route('jenis.index')
            ->with('error_message', 'User dengan id '.$id.' tidak ditemukan');
        return view('jenis.edit', [
            'jenis' => $jenis
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $jumlah = 0;
        $jenis = Jenis::findOrFail($id);
        $jenis_kode_lama = $jenis->kode;
        $jenis->kode = $request->kode;
        $jenis->kode_berkas = $request->kode_berkas;
        $jenis->nama = $request->nama;
        $jenis->keterangan = $request->keterangan;
        $jenis->save();
        if ($jenis_kode_lama != $request->kode) {
           $jumlah = Produk::where('jenis_kode', $jenis_kode_lama)->count();
           Produk::where('jenis_kode', $jenis_kode_lama)->update(['jenis_kode'=>$request->kode]);
        }
    if ($jumlah != 0){
        return redirect()->route('jenis.index')
        ->with('success_message', 'Berhasil mengubah jenis dan mengubah produk '.$jenis->nama.' sebanyak '.$jumlah.'.' );
    }
    else {
        return redirect()->route('jenis.index')
        ->with('success_message', 'Berhasil mengubah jenis.');
    }
    }

    public function show($id)
    {
        $jenis = Jenis::findOrFail($id);
        if (!$jenis) return redirect()->route('jenis.index')
        ->with('error_message', 'Jenis dengan id'.$id.' tidak ditemukan');

        return view('jenis.info', compact('jenis'));
    }

    public function destroy(Request $request, $id)
    {
        $jenis = Jenis::findOrFail($id);
        $jenis_kode = $jenis->kode; 
        $jumlah_produk = Produk::where('jenis_kode', $jenis_kode)->count();
        if ($jumlah_produk){
            return redirect()->route('jenis.index')
            ->with('error_message', 'Tidak dapat menghapus. Jenis Produk masih digunakan sebanyak '.$jumlah_produk.'.');
        }
        else {
            $jenis->delete();
            return redirect()->route('jenis.index')
            ->with('success_message', 'Berhasil menghapus Peraturan');
        } 
    
       
    }
}