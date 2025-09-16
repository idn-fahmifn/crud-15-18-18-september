@extends('template.app')

@section('title')
    Halaman Kategori Barang
@endsection

@section('sub-title')
    Data Kategori Barang yang ada pada database kategori
@endsection

@section('content')
    <div class="card mt-2 p-2">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div class="card-title">
                    <h5>Data Kategori</h5>
                    <span class="text-muted">Berikut adalah tabel kategori produk</span>
                </div>
                <div class="">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Tambah
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
