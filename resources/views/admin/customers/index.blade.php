<x-app-layout>
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4>List Customer</h4>
            <a href="{{ route('customers.create') }}" class="btn btn-primary">Tambah Customer</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <x-card title="Data Pelanggan" subtitle="Kelola data customer toko">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No. Telp</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($customers as $key => $customer)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $customer->nama }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->telepon }}</td>
                            <td>{{ $customer->alamat }}</td>
                            <td>
                                <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin hapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Belum ada data customer.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </x-card>
    </div>
</x-app-layout>