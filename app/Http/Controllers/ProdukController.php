<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Jenis;
use Illuminate\Support\Str;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($jenis_kode = ''){
    if($jenis_kode){
        $jenis = Jenis::where('kode', $jenis_kode)->first();
        if($jenis){
            $produk = Produk::where('jenis_kode', $jenis_kode)->get();
            return view('produk.index')->with('nama_jenis', $jenis->nama)->with('produk', $produk);
        }
        else{
            return abort(403, 'Jenis Produk Hukum Tidak Ada');
            }
        }
    else{
        $produk = Produk::all();
        return view('produk.index')->with('nama_jenis', 'Semua Produk Hukum')->with('produk', $produk);
    }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
{
    $jenis=Jenis::select('kode', 'kode_berkas', 'nama')->get();
    return view('produk.create', compact('jenis'));
}
public function store(Request $request)
{
    $request->validate([
        'jenis_kode' => 'required', 
        'nomor' => 'required', 
        'tahun' => 'required', 
        'tentang' => 'required', 
        'tanggal_penetapan' => 'required', 
        'tanggal_pengundangan' => 'required', 
        'berkas' => 'required|mimes:PDF,pdf|max:2000'
    ]);
    
    $cek=Produk::where('jenis_kode', $request->jenis_kode)->where('nomor', $request->nomor)->where('tahun', $request->tahun)->first();
    if($cek){
        return redirect()->route('produk.create')
        ->with('error_message', 'Produk Hukum dengan Jenis '.$cek->jenis->nama.' nomor '.$request->nomor.' tahun '.$request->tahun.' sudah ada ');
    }
    else{
    $berkas = $request->file('berkas');
	$nama_file = $request->tahun.$request->jenis_kode.Str::padLeft($request->nomor, 3, 0).".pdf";
    
    $berkas->move(storage_path('app/public/file'),$nama_file);

    $request->file('berkas')->getClientOriginalName();
    Produk::create([
        'jenis_kode'=> $request->jenis_kode, 
        'nomor'=> $request->nomor, 
        'tahun'=> $request->tahun, 
        'tentang'=> $request->tentang, 
        'tanggal_penetapan'=> $request->tanggal_penetapan, 
        'tanggal_pengundangan'=> $request->tanggal_pengundangan, 
        'berkas' => $nama_file,
    ]);
    return redirect()->route('produk.index')
        ->with('success_message', 'Berhasil menambah Peraturan baru');
}
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produk = Produk::findOrFail($id);
        if (!$produk) return redirect()->route('produk.index')
        ->with('error_message', 'Produk dengan id'.$id.' tidak ditemukan');

        return view('produk.info', compact('produk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
{

    $jenis=Jenis::select('kode', 'kode_berkas', 'nama')->get();
    $produk = Produk::findOrFail($id);
    if (!$produk) return redirect()->route('produk.index')
        ->with('error_message', 'Produk dengan id'.$id.' tidak ditemukan');

    return view('produk.edit', compact('jenis', 'produk'));
}


public function update(Request $request, $id)
{
    $request->validate([
        'jenis_kode' => 'required', 
        'nomor' => 'required', 
        'tahun' => 'required', 
        'tentang' => 'required', 
        'tanggal_penetapan' => 'required', 
        'tanggal_pengundangan' => 'required'
    ]);

    $berkas = $request->file('berkas');
    $produk = Produk::find($id);
    $produk->jenis_kode = $request->jenis_kode;
    $produk->nomor = $request->nomor;
    $produk->tahun = $request->tahun;
    $produk->tentang = $request->tentang;
    $produk->tanggal_penetapan = $request->tanggal_penetapan;
    $produk->tanggal_pengundangan = $request->tanggal_pengundangan;
    $nama_file = $request->tahun.$request->jenis_kode.Str::padLeft($request->nomor, 3, 0).".pdf";
    if ($request->file('berkas')){
        $tujuan_upload = 'storage';
        @unlink($tujuan_upload.$nama_file);
        $berkas = $request->file('berkas');
        $berkas->move(storage_path('app/public/file'),$nama_file);
    }
    $produk->berkas=$nama_file;
    $produk->save();
    
    return redirect()->route('produk.index')
        ->with('success_message', 'Berhasil mengubah Peraturan');
}
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
{
    $produk = Produk::find($id);
    $nama_file=$produk['berkas'];
    if ($produk) $produk->delete();
    unlink(storage_path('app/public/file/'.$nama_file));

    return redirect()->route('produk.index')
        ->with('success_message', 'Berhasil menghapus Peraturan');

}
public function download($berkas)
{
    $produk = Produk::where('berkas', $berkas)->firstOrFail();
    $pathToFile = storage_path('app/public/file/' . $produk->berkas);
    return response()->download($pathToFile);
}
}
