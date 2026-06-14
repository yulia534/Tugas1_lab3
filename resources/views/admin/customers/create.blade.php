<x-app-layout>
    <div class="container mt-4">
        <div class="mb-3">
            <a href="{{ route('customers.index') }}" class="btn btn-secondary">Kembali</a>
        </div>

        <div class="col-md-6">
            <x-card title="Tambah Customer" subtitle="Masukkan data pelanggan baru">
                <form action="{{ route('customers.store') }}" method="post">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Customer</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">No. Telepon</label>
                        <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}">
                        @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat') }}</textarea>
                        @error('alamat') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </x-card>
        </div>
    </div>
</x-app-layout>