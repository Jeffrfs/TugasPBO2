<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Keranjang;
use App\Models\Barang;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    public function index()
    {
        $keranjangs = Keranjang::with('barang')->where('user_id', Auth::id())->get();
        return view('user.keranjang', compact('keranjangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'jumlah' => 'required|integer|min:1'
        ]);

        $keranjang = Keranjang::where('user_id', Auth::id())
            ->where('barang_id', $request->barang_id)
            ->first();

        if ($keranjang) {
            $keranjang->jumlah += $request->jumlah;
            $keranjang->save();
        } else {
            Keranjang::create([
                'user_id' => Auth::id(),
                'barang_id' => $request->barang_id,
                'jumlah' => $request->jumlah
            ]);
        }

        return back()->with('success', 'Barang ditambahkan ke keranjang.');
    }

    public function destroy($id)
    {
        $item = Keranjang::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $item->delete();

        return back()->with('success', 'Barang dihapus dari keranjang.');
    }
}

