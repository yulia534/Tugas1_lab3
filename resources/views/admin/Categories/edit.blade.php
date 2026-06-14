<x-app-layout>
    <div class="container mt-4">
        <div class="mb-3">
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Kembali</a>
        </div>

        <div class="col-md-6">
            <x-card title="Edit Kategori" subtitle="Ubah data kategori">
                <form action="{{ route('categories.update', $category->id) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Kategori</label>
                        <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $category->nama) }}">
                        @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi', $category->deskripsi) }}</textarea>
                        @error('deskripsi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </x-card>
        </div>
    </div>
</x-app-layout>