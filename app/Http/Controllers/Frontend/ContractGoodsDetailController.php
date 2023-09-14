<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContractGoodsDetailRequest;
use App\Models\ContractGoodsDetail;
use App\Models\Contract;
use App\Models\ContractType;
use App\Models\Customer;
use App\Models\Goods;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ContractGoodsDetailController extends Controller
{
    // public function index()
    // {
    //     $contract_goods_detail = ContractGoodsDetail::orderByDesc('id')->paginate(20);
    //     $viewData = [
    //         'contract_goods_detail' => $contract_goods_detail
    //     ];
    //     return view('frontend.contract_type.index',  $viewData);
    // }

    public function create(Request $request)
    {
        $contractId = $request->input('contract_id');

        $contracts = Contract::all();
        $goods = Goods::all();
        $contract_types = ContractType::all();
        $customers = Customer::all();
        $users = User::all();


        return view('frontend.contract_goods_detail.create', compact('goods', 'contracts', 'contract_types', 'customers', 'users', 'contractId'));
    }

    public function store(ContractGoodsDetailRequest $request)
    {
        try {
            $data = $request->all(); // Lấy dữ liệu từ $request gửi lên
            $data['created_at'] = Carbon::now();

            $contract_goods_detail = ContractGoodsDetail::create($data);

            toastr()->success('Thêm mới thành công!', 'Thông báo', ['timeOut' => 2000]);

            $contractId = $data['contract_id']; // Đảm bảo biến $contractId đã được định nghĩa

            $total_value = DB::table('contract_goods_detail')
                            ->join('goods', 'contract_goods_detail.goods_id', '=', 'goods.id')
                            ->where('contract_goods_detail.contract_id', $contractId)
                            ->select(DB::raw('SUM(goods.total * contract_goods_detail.quantity) AS total_value'))
                            ->first();

            // Cập nhật thuộc tính "value" trong bảng "contracts" với giá trị mới - Cập nhật status thành Hợp đồng mới
            DB::table('contracts')
                ->where('id', $contractId)
                ->update([
                    'value' => $total_value->total_value,
                    'status' => '1',
                    'debt' => $total_value->total_value
                ]);


        } catch (\Exception $exception) {
            Log::error("ERROR => ContractGoodsDetailController@store => " . $exception->getMessage());
            toastr()->error('Thêm mới thất bại!', 'Thông báo', ['timeOut' => 2000]);
            return redirect()->route('get.contract_goods_detail_create');
        }
        return redirect()->route('get.contract_index');
    }

    // public function delete(Request $request)
    // {
    //     $contractId = $request->input('contract_id');
    //     $goodsId = $request->input('goods_id');

    //     try {
    //         $contract_goods_detail = ContractGoodsDetail::findOrFail($goodsId);
    //         if ($contract_goods_detail) {
    //             $contract_goods_detail->delete();
    //             toastr()->success('Xóa thành công!', 'Thông báo', ['timeOut' => 2000]);
    //         } else {
    //             toastr()->error('Xóa thất bại!', 'Thông báo', ['timeOut' => 2000]);
    //         }
    //     } catch (\Exception $exception) {
    //         toastr()->error('Xóa thất bại!', 'Thông báo', ['timeOut' => 2000]);
    //         Log::error("ERROR => ContractGoodsDetailController@delete => " . $exception->getMessage());
    //     }

    //     return redirect()->route('get.contract_update', ['id' => $contractId]);
    // }

}
