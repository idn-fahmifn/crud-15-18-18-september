@extends('template.app')

@section('title')
    Halaman Barang
@endsection

@section('sub-title')
    Data Barang yang ada pada database Barang
@endsection

@section('content')
    <div class="card mt-2 p-2">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div class="card-title">
                    <h5>Data Barang</h5>
                    <span class="text-muted">Berikut adalah tabel Barang</span>
                </div>
                <div class="">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Tambah
                    </button>
                </div>
            </div>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>yeay!</strong> {{ session('success') }}.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul>
                    @foreach ($errors->all() as $item)
                    <li>{{$item}}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

            <div class="table-responsive my-3">
                <table class="table table-hover table-striped">
                    <thead>
                        <th>Nama barang</th>
                        <th>Kategori</th>
                        <th>Pilihan</th>
                    </thead>
                    <tbody>
                        @forelse ($data as $item)
                            <tr>
                                <td>{{ $item->nama_barang }}</td>
                                <td>{{ $item->kategori->nama_kategori }}</td>
                                <td>
                                    <form action="{{ route('barang-delete', $item->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('barang-detail', $item->id) }}" class="btn text-info">Detail</a>
                                        <button type="submit" class="btn text-danger"
                                            onclick="confirm('Yakin mau dihapus?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">Tidak ditemukan data!</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Barang</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('barang-post') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group mt-2">
                            <label for="" class="form-label">Nama barang</label>
                            <input type="text" name="nama_barang" required class="form-control">
                        </div>
                        <div class="form-group mt-2">
                            <label for="" class="form-label">Kategori Barang</label>
                            <select name="id_kategori" required class="form-control">
                                <option value="">Pilih Kategori Barang</option>
                                @foreach ($kategori as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-2">
                            <label for="" class="form-label">Stok</label>
                            <input type="number" name="stok" required class="form-control">
                        </div>
                        <div class="form-group mt-2">
                            <label for="" class="form-label">Harga</label>
                            <input type="number" name="harga" required class="form-control">
                        </div>
                        <div class="form-group mt-2">
                            <label for="" class="form-label">Gambar Barang</label>
                            <input type="file" name="gambar_product" accept="image/*" required class="form-control">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
