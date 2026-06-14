<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('admin.customers.index', compact('customers'));
    }

    public function create()
    {
        return view('admin.customers.create');
    }

    public function store(Request $request)
    {
    

        $request->validate([
            'name'   => 'required',
            'email'  => 'required|email|unique:customers,email',
            'phone'  => 'required',
            'alamat' => 'required',
        ]);

        Customer::create([
            'kode'    => 'CUST-' . strtoupper(uniqid()),
            'nama'    => $request->name,
            'email'   => $request->email,
            'telepon' => $request->phone,
            'alamat'  => $request->alamat,
        ]);

        return redirect()->route('customers.index')->with('success', 'Customer berhasil ditambahkan');
    }

    public function show(Customer $customer)
    {
        return view('admin.customers.show', compact('customer'));
    }

    public function edit(Customer $customer)
    {
        return view('admin.customers.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name'   => 'required',
            'email'  => 'required|email|unique:customers,email,' . $customer->id,
            'phone'  => 'required',
            'alamat' => 'required',
        ]);

        $customer->update([
            'nama'    => $request->name,
            'email'   => $request->email,
            'telepon' => $request->phone,
            'alamat'  => $request->alamat,
        ]);

        return redirect()->route('customers.index')->with('success', 'Customer berhasil diupdate');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'Customer berhasil dihapus');
    }
}