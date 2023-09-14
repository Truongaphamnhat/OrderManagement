<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $customers = Customer::with('category:id,name', 'user:id,name', 'province:id,name', 'district:id,name', 'ward:id,name');

        if ($name = $request->n) // Tìm bằng tên
            $customers->where('name', 'like', '%' . $name . '%');

        if ($s = $request->status) // Tìm bằng trạng thái
            $customers->where('status', $s);

        $customers = $customers
            ->orderByDesc('id')
            ->paginate(20);

        $model = new Customer();
        $status = $model->getStatus();

        $viewData = [
            'customers' => $customers,
            'status' => $status,
        ];
        // $viewData = [];
        return view('backend.customer.index', $viewData);
    }

    public function create()
    {
        $categories = Category::all(); // Hiểm thị dữ liệu của List khách hàng ở trang thêm mới khách hàng

        $model = new Customer();
        $status = $model->getStatus(); // Hiển thị chọn trạng thái
        $provinces = Province::all();
        
        return view('backend.customer.create', compact('categories', 'status', 'provinces'));
    }

    public function store(CustomerRequest $request)
    {
        // dd($request->all());
        try {

            $data = $request->except('_token', 'avatar'); // Lấy dữ liệu từ $request gửi lên trừ _token và avatar
            $data['slug'] = Str::slug($request->name);
            $data['created_at'] = Carbon::now();

            if ($request->avatar) {
                $file = upload_image('avatar');
                if (isset($file['code']) && $file['code'] == 1) {
                    $data['avatar'] = $file['name'];
                }
            }


            $data['user_id'] = Auth::user()->id; // Hiển thị name người tạo customer

            $customer = Customer::create($data);

        } catch (\Exception $exception) {
            Log::error("ERROR => CustomerController@store => " . $exception->getMessage());
            toastr()->error('Thêm mới thất bại!', 'Thông báo', ['timeOut' => 2000]);
            return redirect()->route('get_admin.customer.create');
        }
        toastr()->success('Thêm mới thành công!', 'Thông báo', ['timeOut' => 2000]);
        return redirect()->route('get_admin.customer.index');
    }

    public function edit($id)
    {

        $customer = Customer::findOrFail($id);
        $categories = Category::all();

        $model = new Customer();
        $status = $model->getStatus();

        $provinces = Province::all();

         // Hiển thị district
         $activeDistricts = DB::table('districts')->where('id', $customer->district_id)->pluck('name', 'id')->toArray();

         $activeWards = DB::table('wards')->where('id', $customer->ward_id)->pluck('name', 'id')->toArray();

        return view('backend.customer.update', compact('customer', 'categories', 'status', 'provinces', 'activeDistricts', 'activeWards')); // compact(): Tạo mảng với giá trị 'customer'
    }

    public function update(CustomerRequest $request, $id)
    {
        try {
            $data = $request->except('_token', 'avatar');
            $data['slug'] = Str::slug($request->name);
            $data['updated_at'] = Carbon::now();

            // dd($request->all());
            if ($request->avatar) {
                $file = upload_image('avatar');
                if (isset($file['code']) && $file['code'] == 1) {
                    $data['avatar'] = $file['name'];
                }
            }

            Customer::find($id)->update($data);
            toastr()->success('Cập nhật thành công!', 'Thông báo', ['timeOut' => 2000]);
        } catch (\Exception $exception) {
            Log::error("ERROR => CustomerController@update => " . $exception->getMessage());
            toastr()->error('Cập nhật thất bại!', 'Thông báo', ['timeOut' => 2000]);
            return redirect()->route('get_admin.customer.update', $id);
        }
        return redirect()->route('get_admin.customer.index');
    }

    public function delete(Request $request, $id)
    {
        try {
            $customer = Customer::findOrFail($id);
            if ($customer) $customer->delete();
            toastr()->success('Xóa thành công!', 'Thông báo', ['timeOut' => 2000]);
        } catch (\Exception $exception) {
            toastr()->error('Xóa thất bại!', 'Thông báo', ['timeOut' => 2000]);
            Log::error("ERROR => CategoryController@delete => " . $exception->getMessage());
        }
        return redirect()->route('get_admin.customer.index');
    }
}
