<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContractTypeRequest;
use App\Models\ContractType;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ContractTypeController extends Controller
{
    public function index()
    {
        $contract_types = ContractType::orderByDesc('id')->get();
        $viewData = [
            'contract_types' => $contract_types
        ];
        return view('frontend.contract_type.index',  $viewData);
    }

    public function create()
    {
        return view('frontend.contract_type.create');
    }

    public function store(ContractTypeRequest $request)
    {
        try {

            $data = $request->all(); // Lấy dữ liệu từ $request gửi lên
            $data['created_at'] = Carbon::now();

            $contract_type = ContractType::create($data);

            toastr()->success('Thêm mới thành công!', 'Thông báo', ['timeOut' => 2000]);

        } catch (\Exception $exception) {
            Log::error("ERROR => ContractTypeController@store => " . $exception->getMessage());
            toastr()->error('Thêm mới thất bại!', 'Thông báo', ['timeOut' => 2000]);
            return redirect()->route('get.contract_type_create');
        }
        return redirect()->route('get.contract_type_index');
    }

    public function edit($id)
    {
        $contract_type = ContractType::findOrFail($id);

        return view('frontend.contract_type.update', compact('contract_type'));
    }

    public function update(ContractTypeRequest $request, $id){
        try {
            $data = $request->all();
            $data['updated_at'] = Carbon::now();

            ContractType::find($id)->update($data);
            toastr()->success('Cập nhật thành công!', 'Thông báo', ['timeOut' => 2000]);
        } catch (\Exception $exception) {
            Log::error("ERROR => ContractTypeController@update => ". $exception->getMessage());
            toastr()->error('Cập nhật thất bại!', 'Thông báo', ['timeOut' => 2000]);
            return redirect()->route('get.contract_type_update', $id);
        }
        return redirect()->route('get.contract_type_index');
    }

    public function delete(Request $request, $id){
        try {
            $contract_type = ContractType::findOrFail($id);
            if($contract_type) $contract_type->delete();
            toastr()->success('Xóa thành công!', 'Thông báo', ['timeOut' => 2000]);
        } catch (\Exception $exception) {
            toastr()->error('Xóa thất bại!', 'Thông báo', ['timeOut' => 2000]);
            Log::error("ERROR => ContractTypeController@delete => ". $exception->getMessage());
        }
        return redirect()->route('get.contract_type_index');
    }
}
