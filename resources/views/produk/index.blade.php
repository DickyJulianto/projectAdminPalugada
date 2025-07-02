@extends('layouts.admin') {{-- Ganti dengan nama file layout utama Anda --}}

@section('content')
<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">Manajemen Produk</h1>
    <p class="mb-4">Berikut adalah data produk yang tersedia.</p>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Produk</h6>
            {{-- Tombol Tambah Data --}}
            <a href="{{ route('produk.create') }}" class="btn btn-primary btn-sm float-right">
                <i class="fas fa-plus"></i> Tambah Produk
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Produk</th>
                            <th>Kode</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produks as $produk)
                        <tr>
                            <td>{{ $produk->nama_produk }}</td>
                            <td>{{ $produk->kode_produk }}</td>
                            <td>Rp {{ number_format($produk->harga, 0, ',', '.') }}</td>
                            <td>{{ $produk->stok }}</td>
                            <td>
                                {{-- Tombol Edit --}}
                                <a href="{{ route('produk.edit', $produk->id) }}" class="btn btn-warning btn-circle btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                {{-- Tombol Hapus --}}
                                <form action="{{ route('produk.destroy', $produk->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
