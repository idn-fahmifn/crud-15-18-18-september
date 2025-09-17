<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $data = Barang::all();
        $kategori = Kategori::all();
        return view('barang.index', 
        compact('data', 'kategori'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => ['required', 'string', 'max:30'],
            'id_kategori' => ['required', 'numeric'],
            'harga' => ['required', 'numeric', 'min:1000', 'max:10000000'],
            'stok' => ['required', 'numeric', 'min:0', 'max:999'],
            'gambar_product' => ['required', 'file', 'mimes:png,jpg,jpeg,svg,webp,heic']
        ]);
        // array untuk menyimpan data
        $simpan = [
            'nama_barang' => $request->input('nama_barang'),
            'id_kategori' => $request->input('id_kategori'),
            'harga' => $request->input('harga'),
            'stok' => $request->input('stok'),
        ];

        // kondisi ketika ada file yang masuk
        if($request->hasFile('gambar_product'))
        {
            $gambar = $request->file('gambar_product'); //mengambil gambar
            $path = 'public/gambar/barang'; //path penyimpanan
            $nama = 'gambar_barang_'.Carbon::now()->format('Ymdhis').'.'.$gambar->getClientOriginalExtension(); //gambar_barang_tanggal.jpg
            $simpan['gambar_product'] = $nama; //data yang akan disimipan di database (nama)
            $gambar->storeAs($path, $nama);
        }
        Barang::create($simpan);
        return redirect()->route('barang-index')->with('success', 'Barang berhasil ditambahkan');
    }
    public function detail($id)
    {
        $data = Barang::findOrFail($id);
        return view('barang.detail', 
        compact('data'));
    }
}
