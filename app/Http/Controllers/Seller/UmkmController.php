<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UmkmController extends Controller
{
    public function edit()
    {
        $umkm = Auth::user()->umkm;

        if (!$umkm) {
            return redirect()->route('seller.dashboard')->with('error', 'UMKM belum terdaftar.');
        }

        return view('seller.umkm.edit', compact('umkm'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $umkm = Auth::user()->umkm;

        if (!$umkm) {
            return redirect()->route('seller.dashboard')->with('error', 'UMKM belum terdaftar.');
        }

        $umkm->update($request->only(['name', 'description']));

        return redirect()->route('seller.umkm.edit')->with('success', 'UMKM berhasil diperbarui.');
    }
}
