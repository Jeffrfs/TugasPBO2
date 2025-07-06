<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Keranjang;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function store()
    {
        $user = Auth::user();
        $keranjangs = Keranjang::with('barang')->where('user_id', $user->id)->get();

        if ($keranjangs->isEmpty()) {
            return back()->with('error', 'Keranjang kosong!');
        }

        $total = 0;
        foreach ($keranjangs as $item) {
            $total += $item->barang->harga * $item->jumlah;
        }

        $transaksi = Transaksi::create([
            'user_id' => $user->id,
            'total' => $total,
        ]);

        foreach ($keranjangs as $item) {
            TransaksiDetail::create([
                'transaksi_id' => $transaksi->id,
                'barang_id' => $item->barang_id,
                'jumlah' => $item->jumlah,
            ]);
        }

        Keranjang::where('user_id', $user->id)->delete();

        return redirect()->route('checkout.riwayat')->with('success', 'Checkout berhasil!');
    }

    public function riwayat()
    {
        $transaksis = Transaksi::with('details.barang')->where('user_id', Auth::id())->get();
        return view('user.riwayat', compact('transaksis'));
    }
}
