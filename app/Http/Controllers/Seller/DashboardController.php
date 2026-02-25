<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $umkm = $user->umkm;

        $stats = [
            'product_count' => $umkm ? $umkm->products()->count() : 0,
            'order_count' => $umkm ? $umkm->orders()->count() : 0,
            'pending_orders' => $umkm ? $umkm->orders()->where('status', 'PENDING')->count() : 0,
            'completed_orders' => $umkm ? $umkm->orders()->where('status', 'COMPLETED')->count() : 0,
        ];

        return view('seller.dashboard', compact('umkm', 'stats'));
    }
}
