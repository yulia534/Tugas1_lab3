<x-app-layout>
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4>List Kategori</h4>
            <a href="{{ route('categories.create') }}" class="btn btn-primary">Tambah Kategori</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <x-card title="Data Kategori" subtitle="Kelola kategori produk">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $key => $category)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $category->nama }}</td>
                            <td>{{ $category->deskripsi }}</td>
                            <td>
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin hapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Belum ada kategori.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </x-card>
    </div>
</x-app-layout>