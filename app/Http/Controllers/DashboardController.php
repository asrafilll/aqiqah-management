<?php

namespace App\Http\Controllers;

use App\Models\Order\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Source orders
        // 1: IG
        // 2: Facebook
        // 3: Google
        // 4: Others
        $formatIdrNumber = function ($number) {
            return number_format($number, 0, ',', '.');
        };
        $totalOrders = $formatIdrNumber(Order::query()->count());
        $totalGoogleOrders = $formatIdrNumber(
            Order::query()
                ->where('source_order_id', 3)
                ->count()
        );
        $totalFacebookOrders = $formatIdrNumber(
            Order::query()
                ->where('source_order_id', 2)
                ->count()
        );
        $totalOthersOrders = $formatIdrNumber(
            Order::query()
                ->where('source_order_id', 4)
                ->count()
        );

        return view('dashboard', [
            'totalOrders' => $totalOrders,
            'totalGoogleOrders' => $totalGoogleOrders,
            'totalFacebookOrders' => $totalFacebookOrders,
            'totalOthersOrders' => $totalOthersOrders,
        ]);
    }
}
