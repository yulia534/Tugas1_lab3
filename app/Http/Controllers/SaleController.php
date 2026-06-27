<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Customer;
use App\Models\Product;
use App\Models\SaleItem;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::with('customer', 'items')->get();
        return view('sales.index', compact('sales'));
    }

    public function create()
    {
        $customers = Customer::all();
        $products = Product::all();
        return view('sales.create', compact('customers', 'products'));
    }

    public function store(Request $request)
    {
        $sale = Sale::create([
            'kode' => $request->kode,
            'customer_id' => $request->customer_id,
            'tanggal' => $request->tanggal,
            'total' => array_sum($request->subtotal),
        ]);

        foreach ($request->product_id as $i => $product_id) {
            SaleItem::create([
                'sale_id' => $sale->id,
                'product_id' => $product_id,
                'qty' => $request->qty[$i],
                'harga' => $request->harga[$i],
                'subtotal' => $request->subtotal[$i],
            ]);
        }

        return redirect()->route('sales.index')->with('success', 'Data berhasil disimpan');
    }

    public function show(Sale $sale)
    {
        $sale->load('customer', 'items.product');
        return view('sales.show', compact('sale'));
    }

    public function edit(Sale $sale)
    {
        $customers = Customer::all();
        $products = Product::all();
        $sale->load('items');
        return view('sales.edit', compact('sale', 'customers', 'products'));
    }

    public function update(Request $request, Sale $sale)
    {
        $sale->update([
            'kode' => $request->kode,
            'customer_id' => $request->customer_id,
            'tanggal' => $request->tanggal,
            'total' => array_sum($request->subtotal),
        ]);

        $sale->items()->delete();

        foreach ($request->product_id as $i => $product_id) {
            SaleItem::create([
                'sale_id' => $sale->id,
                'product_id' => $product_id,
                'qty' => $request->qty[$i],
                'harga' => $request->harga[$i],
                'subtotal' => $request->subtotal[$i],
            ]);
        }

        return redirect()->route('sales.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy(Sale $sale)
    {
        $sale->items()->delete();
        $sale->delete();
        return redirect()->route('sales.index')->with('success', 'Data berhasil dihapus');
    }
}