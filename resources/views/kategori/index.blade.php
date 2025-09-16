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
            <div class="table-responsive my-3">
                <table class="table table-hover table-striped">
                    <thead>
                        <th>Nama Kategori</th>
                        <th>Deskripsi</th>
                        <th>Pilihan</th>
                    </thead>
                </table>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
