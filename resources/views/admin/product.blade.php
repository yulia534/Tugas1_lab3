<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    @include('components.navadmin')

    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Daftar Product</h2>
            <a href="#" class="btn btn-primary">Tambah Product</a>
        </div>

        <div class="card">
            <div class="card-header bg-light">
                <h5 class="card-title mb-0">Data Barang</h5>
                <small class="text-muted">Kelola kode, nama, satuan, dan harga barang</small>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped mt-2">
                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Satuan</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>BRG001</td>
                                <td>Sabun Cuci</td>
                                <td>Pcs</td>
                                <td>Rp 5.000</td>
                                <td>
                                    <a href="{{ route('admin.product.edit', 1) }}" 
                                    class="btn btn-warning btn-sm">Edit</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>