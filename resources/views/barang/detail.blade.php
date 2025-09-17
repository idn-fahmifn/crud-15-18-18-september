@extends('template.app')

@section('title')
    {{$data->nama_barang}}
@endsection

@section('sub-title')
    {{$data->kategori->nama_kategori}}
@endsection

@section('content')
    <div class="card mt-2 p-2">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div class="card-title">
                    <h5>Detail barang</h5>
                    <span class="text-muted">{{$data->nama_barang}}</span>
                </div>
                <div class="">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Edit Kategori
                    </button>
                </div>
            </div>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>yeay!</strong> {{ session('success') }}.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="table-responsive my-3">
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <td>Nama Barang  </td>
                            <td>{{$data->nama_barang}}</td>
                            <td rowspan="3">
                                <img src="{{asset('storage/gambar/barang/'.$data->gambar_product)}}" width="100" alt="gambar barang">
                            </td>
                        </tr>
                        <tr>
                            <td>Harga  </td>
                            <td>IDR. {{number_format($data->harga)}}</td>
                        </tr>
                        <tr>
                            <td>Stok</td>
                            <td>{{$data->stok}}</td>
                        </tr>
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kategori</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{route('kategori-update', $data->id)}}" method="post">
                    @csrf
                    @method('put')
                    <div class="modal-body">
                        <div class="form-group mt-2">
                            <label for="" class="form-label">Nama Kategori</label>
                            <input type="text" name="nama_kategori" value="{{$data->nama_kategori}}" class="form-control">
                        </div>
                        <div class="form-group mt-2">
                            <label for="" class="form-label">Deskripsi Kategori</label>
                            <textarea name="deskripsi" class="form-control">{{$data->deskripsi}}</textarea>
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
