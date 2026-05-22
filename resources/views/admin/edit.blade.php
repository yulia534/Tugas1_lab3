@extends('layouts.admin') {{-- Sesuaikan dengan nama template admin Anda --}}

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Edit Product</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.product.update', 1) }}" method="POST">
                @csrf
                @method('PUT') {{-- WAJIB ada di Laravel untuk proses Edit --}}

                <div class="form-group mb-3">
                    <label class="form-label font-weight-bold">Kode Barang</label>
                    <input type="text" name="kode_barang" class="form-control" value="BRG001" required>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label font-weight-bold">Nama Barang</label>
                    <input type="text" name="nama_barang" class="form-control" value="Sabun Cuci" required>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label font-weight-bold">Satuan</label>
                    <input type="text" name="satuan" class="form-control" value="Pcs" required>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label font-weight-bold">Harga</label>
                    <input type="number" name="harga" class="form-control" value="5000" required>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                    <a href="{{ route('admin.product.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection