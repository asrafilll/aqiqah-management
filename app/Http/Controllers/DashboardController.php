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
        $countOrdersBySourceOrderId = function ($sourceOrderId) use ($formatIdrNumber) {
            return $formatIdrNumber(
                Order::query()
                    ->where('source_order_id', $sourceOrderId)
                    ->count()
            );
        };

        return view('dashboard', [
            'totalOrders' => $formatIdrNumber(Order::query()->count()),
            'totalInstagramOrders' => $countOrdersBySourceOrderId(1),
            'totalFacebookOrders' => $countOrdersBySourceOrderId(2),
            'totalGoogleOrders' => $countOrdersBySourceOrderId(3),
            'totalOthersOrders' => $countOrdersBySourceOrderId(4),
        ]);
    }
}
