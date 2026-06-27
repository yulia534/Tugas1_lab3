<x-appadmin-layout>

    <div class="container">
        <h1 class="fw-bold">Detail Sale</h1>
        <p>Detail transaksi penjualan</p>

        <div class="card mb-3">
            <div class="card-body">
                <p><strong>Kode</strong>: {{ $sale->kode }}</p>
                <p><strong>Customer</strong>: {{ $sale->customer->nama }}</p>
                <p><strong>Tanggal</strong>: {{ \Carbon\Carbon::parse($sale->tanggal)->format('d M Y') }}</p>
                <p><strong>Total</strong>: Rp {{ number_format($sale->total, 0, ',', '.') }}</p>
            </div>
        </div>

        <h5>Item Produk</h5>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Produk</th>
                    <th>Qty</th>
                    <th>Harga</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sale->items as $i => $item)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $item->product->nama_barang }}</td>
                    <td>{{ $item->qty }}</td>
                    <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('sales.index') }}" class="btn btn-secondary">Kembali</a>
    </div>

</x-appadmin-layout>