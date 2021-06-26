<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    public function index()
    {
    	// mengambil data dari table barang
    	$barang = DB::table('barang')->get();

    	// mengirim data barang ke view home
    	return view('/home',['barang' => $barang]);

    }

    public function tambah(Request $request){
        // insert data ke table pegawai
        DB::table('barang')->insert([
            'foto_barang' => $request->foto,
            'nama_barang' => $request->nama,
            'kategori' => $request->kategori,
            'harga' => $request->harga
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/home');
    }

    // method untuk edit data pegawai
    public function edit($id)
    {
        // mengambil data pegawai berdasarkan id yang dipilih
        $barang = DB::table('barang')->where('barang_id',$id)->get();
        // passing data pegawai yang didapat ke view edit.blade.php
        return view('/edit',['barang' => $barang]);
    }

    public function update(Request $request)
    {
        // update data pegawai
        DB::table('barang')->where('barang_id',$request->id)->update([
            'foto_barang' => $request->foto,
            'nama_barang' => $request->nama,
            'kategori' => $request->kategori,
            'harga' => $request->harga
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/home');
    }

    // method untuk hapus data pegawai
    public function hapus($id)
    {
        // menghapus data pegawai berdasarkan id yang dipilih
        DB::table('barang')->where('barang_id',$id)->delete();

        // alihkan halaman ke halaman pegawai
        return redirect('/home');
    }

}
