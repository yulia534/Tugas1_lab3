<x-appadmin-layout>

    <div class="container">
        <h1 class="fw-bold">Edit Sale</h1>
        <p>Edit transaksi penjualan</p>

        <form action="{{ route('sales.update', $sale->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Kode</label>
                <input type="text" name="kode" class="form-control" value="{{ $sale->kode }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Customer</label>
                <select name="customer_id" class="form-control" required>
                    <option value="">-- Pilih Customer --</option>
                    @foreach($customers as $customer)
                        <option value="{{ $customer->id }}" {{ $sale->customer_id == $customer->id ? 'selected' : '' }}>{{ $customer->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal</label>
                <input type="date" name="tanggal" class="form-control" value="{{ $sale->tanggal }}" required>
            </div>

            <h5 class="mt-4">Item Produk</h5>
            <table class="table table-bordered" id="itemTable">
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Qty</th>
                        <th>Harga</th>
                        <th>Subtotal</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sale->items as $item)
                    <tr>
                        <td>
                            <select name="product_id[]" class="form-control product" required>
                                <option value="">-- Pilih Produk --</option>
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}" data-harga="{{ $product->harga }}" {{ $item->product_id == $product->id ? 'selected' : '' }}>{{ $product->nama_barang }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td><input type="number" name="qty[]" class="form-control qty" min="1" value="{{ $item->qty }}" required></td>
                        <td><input type="number" name="harga[]" class="form-control harga" value="{{ $item->harga }}" readonly></td>
                        <td><input type="number" name="subtotal[]" class="form-control subtotal" value="{{ $item->subtotal }}" readonly></td>
                        <td><button type="button" class="btn btn-danger btn-sm hapus">X</button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <button type="button" class="btn btn-secondary mb-3" id="tambahItem">+ Tambah Item</button>

            <div class="mb-3">
                <label class="form-label">Total</label>
                <input type="number" id="grandTotal" class="form-control" value="{{ $sale->total }}" readonly>
            </div>

            <a href="{{ route('sales.index') }}" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

    <script>
        function hitungSubtotal(row) {
            const qty = parseFloat(row.querySelector('.qty').value) || 0;
            const harga = parseFloat(row.querySelector('.harga').value) || 0;
            const subtotal = qty * harga;
            row.querySelector('.subtotal').value = subtotal;
            hitungTotal();
        }

        function hitungTotal() {
            let total = 0;
            document.querySelectorAll('.subtotal').forEach(el => {
                total += parseFloat(el.value) || 0;
            });
            document.getElementById('grandTotal').value = total;
        }

        document.addEventListener('change', function(e) {
            if (e.target.classList.contains('product')) {
                const row = e.target.closest('tr');
                const selected = e.target.options[e.target.selectedIndex];
                const harga = selected.getAttribute('data-harga') || 0;
                row.querySelector('.harga').value = harga;
                hitungSubtotal(row);
            }
            if (e.target.classList.contains('qty')) {
                hitungSubtotal(e.target.closest('tr'));
            }
        });

        document.getElementById('tambahItem').addEventListener('click', function() {
            const tbody = document.querySelector('#itemTable tbody');
            const firstRow = tbody.querySelector('tr');
            const newRow = firstRow.cloneNode(true);
            newRow.querySelectorAll('input').forEach(i => i.value = '');
            newRow.querySelector('.qty').value = 1;
            newRow.querySelector('select').selectedIndex = 0;
            tbody.appendChild(newRow);
        });

        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('hapus')) {
                const tbody = document.querySelector('#itemTable tbody');
                if (tbody.querySelectorAll('tr').length > 1) {
                    e.target.closest('tr').remove();
                    hitungTotal();
                }
            }
        });
    </script>

</x-appadmin-layout>