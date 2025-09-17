<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $data = Kategori::all();
        return view('kategori.index', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => ['required', 'string', 'min:3', 'max:20'],
            'deskripsi' => ['required']
        ]); 

        // mengirimkan data
        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('kategori-index')
        ->with('success', 'Kategori berhasil ditambahkan');

    }
    public function detail($id)
    {
        $data = Kategori::findOrFail($id);
        return view('kategori.detail', 
        compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Kategori::findOrFail($id);
        $request->validate([
            'nama_kategori' => ['required', 'string', 'min:3', 'max:20'],
            'deskripsi' => ['required']
        ]); 
        $data->update([
            'nama_kategori' => $request->nama_kategori,
            'deskripsi' => $request->deskripsi,
        ]); 

        return back()->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $data = Kategori::findOrFail($id);
        $data->delete();
        return back()->with('success', 'Data berhasil dihapus');
    }

}
