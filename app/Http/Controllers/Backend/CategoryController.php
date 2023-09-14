<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderByDesc('id')->paginate(20); // Phân trang 20 dòng
        $viewData = [
            'categories' => $categories
        ];
        return view('backend.category.index', $viewData);
    }

    public function create()
    {
        return view('backend.category.create');
    }

    public function store(CategoryRequest $request)
    {
        // dd($request->all());
        try {

            $data = $request->except('_token', 'avatar'); // Lấy dữ liệu từ $request gửi lên trừ _token và avatar
            $data['slug'] = Str::slug($request->name);
            $data['created_at'] = Carbon::now();

            if($request->avatar){
                $file = upload_image('avatar');
                if(isset($file['code']) && $file['code'] == 1){
                    $data['avatar'] = $file['name'];
                }
            }

            $category = Category::create($data);

            toastr()->success('Thêm mới thành công!', 'Thông báo', ['timeOut' => 2000]);
        } catch (\Exception $exception) {
            Log::error("ERROR => CategoryController@store => " . $exception->getMessage());
            toastr()->error('Thêm mới thất bại!', 'Thông báo', ['timeOut' => 2000]);
            return redirect()->route('get_admin.category.create');
        }
        return redirect()->route('get_admin.category.index');
    }

    public function edit($id){

        $category = Category::findOrFail($id);
        return view('backend.category.update', compact('category')); // compact(): Tạo mảng với giá trị 'category'
    }

    public function update(CategoryRequest $request, $id){
        try {
            $data = $request->except('_token', 'avatar');
            $data['slug'] = Str::slug($request->name);
            $data['updated_at'] = Carbon::now();

            // dd($request->all());
            /* Nếu có name = avatar gửi lên request và có kết quả trả về "code" */
            if($request->avatar){
                $file = upload_image('avatar');
                if(isset($file['code']) && $file['code'] == 1){
                    $data['avatar'] = $file['name'];
                }
            }

            Category::find($id)->update($data);
            toastr()->success('Cập nhật thành công!', 'Thông báo', ['timeOut' => 2000]);
        } catch (\Exception $exception) {
            Log::error("ERROR => CategoryController@update => ". $exception->getMessage());
            toastr()->error('Cập nhật thất bại!', 'Thông báo', ['timeOut' => 2000]);
            return redirect()->route('get_admin.category.update', $id);
        }
        return redirect()->route('get_admin.category.index');
    }

    public function delete(Request $request, $id){
        try {
            $category = Category::findOrFail($id);
            if($category) $category->delete();
            toastr()->success('Xóa thành công!', 'Thông báo', ['timeOut' => 2000]);
        } catch (\Exception $exception) {
            toastr()->error('Xóa thất bại!', 'Thông báo', ['timeOut' => 2000]);
            Log::error("ERROR => CategoryController@delete => ". $exception->getMessage());
        }
        return redirect()->route('get_admin.category.index');
    }
}
