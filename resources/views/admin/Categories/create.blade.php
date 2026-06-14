<x-app-layout>
    <div class="container mt-4">
        <div class="mb-3">
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Kembali</a>
        </div>

        <div class="col-md-6">
            <x-card title="Tambah Kategori" subtitle="Masukkan kategori baru">
                <form action="{{ route('categories.store') }}" method="post">
                    @csrf

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Kategori</label>
                        <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}">
                        @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </x-card>
        </div>
    </div>
</x-app-layout>