<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Contact;
use App\Models\Province;
use App\Models\Representer;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function index()
    {

        $customers = Customer::with('category:id,name', 'user:id,name', 'province:id,name', 'district:id,name', 'ward:id,name');

        // if ($name = $request->n) // Tìm bằng tên
        //     $customers->where('name', 'like', '%' . $name . '%');

        // if ($s = $request->status) // Tìm bằng trạng thái
        //     $customers->where('status', $s);

        $customers = $customers
            ->orderByDesc('id')
            ->paginate(20);

        $model = new Customer();
        $status = $model->getStatus();

        $viewData = [
            'customers' => $customers,
            'status' => $status,
        ];

        return view('frontend.customer.index', $viewData);
    }

    public function create()
    {
        $categories = Category::all();

        $model = new Customer();
        $status = $model->getStatus();
        $provinces = Province::all();

        return view('frontend.customer.create', compact('categories', 'status', 'provinces'));
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
            return redirect()->route('frontend.customer.create');
        }
        toastr()->success('Thêm mới thành công!', 'Thông báo', ['timeOut' => 2000]);
        return redirect()->route('get.index');
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

        $representers = Representer::where('customer_id', $id)
            ->with('customer:id,name', 'user:id,name', 'province:id,name', 'district:id,name', 'ward:id,name');

        $representers = $representers
            ->orderByDesc('id')
            ->paginate(20);


        return view('frontend.customer.update', compact('customer', 'categories', 'status', 'provinces', 'activeDistricts', 'activeWards', 'representers'));
    }

    public function detail($id)
    {

        $customer = Customer::findOrFail($id);

        $categories = Category::all();
        $contacts = Contact::all();

        $model = new Customer();
        $status = $model->getStatus();

        $representers = Representer::where('customer_id', $id)
            ->with('customer:id,name', 'user:id,name', 'province:id,name', 'district:id,name', 'ward:id,name');

        $representers = $representers
            ->orderByDesc('id')
            ->paginate(20);

        return view('frontend.customer.detail', compact('customer', 'contacts', 'categories', 'status', 'representers'));
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
        } catch (\Exception $exception) {
            Log::error("ERROR => CustomerController@update => " . $exception->getMessage());
            toastr()->error('Cập nhật thất bại!', 'Thông báo', ['timeOut' => 2000]);
            return redirect()->route('get.category_update', $id);
        }
        toastr()->success('Cập nhật thành công!', 'Thông báo', ['timeOut' => 2000]);
        return redirect()->route('get.index');
    }

    public function delete(Request $request, $id)
    {
        try {
            $customer = Customer::findOrFail($id);
            if ($customer) $customer->delete();
        } catch (\Exception $exception) {
            toastr()->error('Xóa thất bại!', 'Thông báo', ['timeOut' => 2000]);
            Log::error("ERROR => CategoryController@delete => " . $exception->getMessage());
        }
        toastr()->success('Xóa thành công!', 'Thông báo', ['timeOut' => 2000]);
        return redirect()->route('get.index');
    }
}
