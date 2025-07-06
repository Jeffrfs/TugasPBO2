<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        return view('admin.barang.index', compact('barangs'));
    }

    public function create()
    {
        return view('admin.barang.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi' => 'nullable|string',
        ]);

        $barang = new Barang();
        $barang->nama = $request->nama;
        $barang->harga = $request->harga;
        $barang->deskripsi = $request->deskripsi;

        if ($request->hasFile('gambar')) {
            $barang->gambar = $request->file('gambar')->store('barang', 'public');
        }

        $barang->save();

        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan.');
    }

    public function edit(Barang $barang)
    {
        return view('admin.barang.form', compact('barang'));
    }

    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi' => 'nullable|string',
        ]);

        $barang->nama = $request->nama;
        $barang->harga = $request->harga;
        $barang->deskripsi = $request->deskripsi;

        if ($request->hasFile('gambar')) {
            if ($barang->gambar) {
                Storage::disk('public')->delete($barang->gambar);
            }
            $barang->gambar = $request->file('gambar')->store('barang', 'public');
        }

        $barang->save();

        return redirect()->route('barang.index')->with('success', 'Barang berhasil diperbarui.');
    }

    public function destroy(Barang $barang)
    {
        if ($barang->gambar) {
            Storage::disk('public')->delete($barang->gambar);
        }

        $barang->delete();

        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus.');
    }
}