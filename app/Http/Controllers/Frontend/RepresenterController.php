<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CustomerRequest;
use App\Http\Requests\RepresenterRequest;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Contact;
use App\Models\Province;
use App\Models\Representer;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class RepresenterController extends Controller
{
    public function index(){

        $representers = Representer::with('customer:id,name', 'user:id,name', 'province:id,name', 'district:id,name', 'ward:id,name');

        // if ($name = $request->n) // Tìm bằng tên
        //     $customers->where('name', 'like', '%' . $name . '%');

        // if ($s = $request->status) // Tìm bằng trạng thái
        //     $customers->where('status', $s);

        $representers = $representers
            ->orderByDesc('id')
            ->paginate(20);

        $model = new Customer();
        $status = $model->getStatus();

        $viewData = [
            'representers' => $representers,
            'status' => $status,
        ];

        return view('frontend.representer.index', $viewData);
    }

    public function create()
    {
        $customers = Customer::all();
        $provinces = Province::all();

        return view('frontend.representer.create', compact('provinces', 'customers'));
    }

    public function store(RepresenterRequest $request)
    {
        // dd($request->all());
        try {

            $data = $request->except('_token', 'avatar', 'customer_name', 'customer_email', 'customer_phone', 'customer_tax_code' );
            $data['slug'] = Str::slug($request->name);
            $data['created_at'] = Carbon::now();

            if ($request->avatar) {
                $file = upload_image('avatar');
                if (isset($file['code']) && $file['code'] == 1) {
                    $data['avatar'] = $file['name'];
                }
            }

            $data['user_id'] = Auth::user()->id; // Hiển thị name người tạo customer

            $representer = Representer::create($data);

        } catch (\Exception $exception) {
            Log::error("ERROR => RepresenterController@store => " . $exception->getMessage());
            toastr()->error('Thêm mới thất bại!', 'Thông báo', ['timeOut' => 2000]);
            return redirect()->route('get.representer_create');
        }
            toastr()->success('Thêm mới thành công!', 'Thông báo', ['timeOut' => 2000]);
            return redirect()->route('get.representer_index');
    }

    public function edit($id)
    {
        $representer = Representer::findOrFail($id);

        $provinces = Province::all();

        $activeDistricts = DB::table('districts')->where('id', $representer->district_id)->pluck('name', 'id')->toArray();

        $activeWards = DB::table('wards')->where('id', $representer->ward_id)->pluck('name', 'id')->toArray();

        $customers = Customer::all();

        return view('frontend.representer.update', compact('representer', 'provinces', 'activeDistricts', 'activeWards', 'customers'));
    }

    public function detail($id){

        $representer = Representer::findOrFail($id);

        return view('frontend.representer.detail', compact('representer'));
    }

    public function update(RepresenterRequest $request, $id)
    {
        try {
            $data = $request->except('_token', 'avatar', 'customer_name', 'customer_email', 'customer_phone', 'customer_tax_code' );
            $data['slug'] = Str::slug($request->name);
            $data['updated_at'] = Carbon::now();

            // dd($request->all());
            if ($request->avatar) {
                $file = upload_image('avatar');
                if (isset($file['code']) && $file['code'] == 1) {
                    $data['avatar'] = $file['name'];
                }
            }

            Representer::find($id)->update($data);

        } catch (\Exception $exception) {
            Log::error("ERROR => RepresenterController@update => " . $exception->getMessage());
            toastr()->error('Cập nhật thất bại!', 'Thông báo', ['timeOut' => 2000]);
            return redirect()->route('get.representer_update', $id);
        }
        toastr()->success('Cập nhật thành công!', 'Thông báo', ['timeOut' => 2000]);
        return redirect()->route('get.representer_index');
    }

    public function delete(Request $request, $id)
    {
        try {
            $representer = Representer::findOrFail($id);
            if ($representer) $representer->delete();
        } catch (\Exception $exception) {
            toastr()->error('Xóa thất bại!', 'Thông báo', ['timeOut' => 2000]);
            Log::error("ERROR => RepresenterController@delete => " . $exception->getMessage());
        }
        toastr()->success('Xóa thành công!', 'Thông báo', ['timeOut' => 2000]);
        // return redirect()->route('get.representer_index');
        return redirect()->back();
    }

}
