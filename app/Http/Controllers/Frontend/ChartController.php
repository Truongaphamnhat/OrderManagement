<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Order;
use App\Models\Order_goods_detail;
use App\Models\Goods;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ChartController extends Controller
{
    public function barchart(){
        // Sử dụng query builder để lấy tổng doanh số bán hàng theo tháng
        $data = Order_goods_detail::
        join('orders', 'order_goods_details.order_id', '=', 'orders.id')
        ->select(Order::raw('DATE_FORMAT(orders.created_at, "%Y-%m") as thang'), Order_goods_detail::raw('SUM(order_goods_details.price) as doanh_so'))
        ->groupBy(Order::raw('DATE_FORMAT(orders.created_at, "%Y-%m")'))
        ->orderBy('thang')
        ->get();

        // Convert dữ liệu thành mảng để sử dụng trong biểu đồ
        $labels = $data->pluck('thang')->toArray();
        $values = $data->pluck('doanh_so')->toArray();

        // Truy vấn dữ liệu lấy thông tin xuất ra bảng doanh số
        $data_table = Order::join('order_goods_details', 'orders.id', '=', 'order_goods_details.order_id')
            ->join('goods', 'order_goods_details.goods_id', '=', 'goods.id')
            ->select(
                Order::raw('DATE_FORMAT(orders.created_at, "%Y-%m") as thang'),
                Order_goods_detail::raw('SUM(order_goods_details.quantity) as so_luong'),
                Order_goods_detail::raw('SUM(order_goods_details.price) as gia_tri_hang_hoa'),
                'goods.name'
            )
            ->groupBy('thang', 'goods.name')
            ->get();

        // //Đếm số lượng đơn hàng 
        // $count_orders = Order::select(
        //     Order::raw('DATE_FORMAT(orders.created_at, "%Y-%m") as thang'),
        //     Order::raw('COUNT(orders.id) as so_luong_don_hang')
        // )->groupBy('thang')->get();

        // //Tổng giá trị đơn hàng theo tháng
        // $total_order_values = Order_goods_detail::
        // join('orders', 'order_goods_details.order_id', '=', 'orders.id')
        // ->select(Order::raw('DATE_FORMAT(orders.created_at, "%Y-%m") as thang'), 
        // Order_goods_detail::raw('SUM(order_goods_details.price) as tong_gia_tri_don_hang'))
        // ->groupBy(Order::raw('DATE_FORMAT(orders.created_at, "%Y-%m")'))
        // ->orderBy('thang')
        // ->get();

        // Tính tên hàng hóa bán chạy và ít được bán
        $bestSellingGoods = $data_table->groupBy('thang')->map(function ($group) {
            return $group->max('so_luong');
        });
        $worstSellingGoods = $data_table->groupBy('thang')->map(function ($group) {
            return $group->min('so_luong');
        });

         // Tìm tên hàng hóa bán chạy
         $bestSellingGoodsNames = [];
         foreach ($bestSellingGoods as $thang => $maxSoLuong) {
             $bestSellingGoodsNames[$thang] = $data_table
                 ->where('thang', $thang)
                 ->where('so_luong', $maxSoLuong)
                 ->pluck('name')
                 ->first();
         }

            // Tìm tên hàng hóa ít được bán
        $worstSellingGoodsNames = [];
        foreach ($worstSellingGoods as $thang => $minSoLuong) {
            $worstSellingGoodsNames[$thang] = $data_table
                ->where('thang', $thang)
                ->where('so_luong', $minSoLuong)
                ->pluck('name')
                ->first();
        }
        return view('frontend.chart.barchart', compact('labels', 'values', 
        'data_table', 'bestSellingGoodsNames', 'worstSellingGoodsNames',));
    }
}
