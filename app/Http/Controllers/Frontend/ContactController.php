<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\CustomerRequest;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Position;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ContactController extends Controller
{
    public function index(){
        $customers = Customer::all();
        $positions = Position::all();

        $contacts = Contact::with('customer:id,name', 'position:id,name');
        $contacts = $contacts->orderByDesc('id')->paginate(20); // Phân trang 20 dòng
        $viewData = [
            'contacts' => $contacts

        ];
        return view('frontend.contact.index', $viewData);
    }

    public function create(){

        $customers = Customer::all();
        $positions = Position::all();
        $model = new Contact();
        $gender = $model->getGender();

        return view('frontend.contact.create', compact('customers', 'positions', 'gender'));
    }

public function store(ContactRequest $request)
    {
        // dd($request->all());
        try {
            $data = $request->except('_token');
            $data =[
                'name' => $request->name,
                'customer_id' => $request->customer_id,
                'position_id' => $request->position_id,
                'email' => $request->email,
                'address' => $request->address,
                'gender' => $request->gender,
                'phone' => $request->phone,
                'birthday' => $request->birthday
        ];
            $data['created_at'] = Carbon::now();
            $data['user_id'] = Auth::user()->id; // Hiển thị name người tạo contact

            $contact = Contact::create($data);

        } catch (\Exception $exception) {
            Log::error("ERROR => ContactController@store => " . $exception->getMessage());
            toastr()->error('Thêm mới thất bại!', 'Thông báo', ['timeOut' => 2000]);
            return redirect()->route('get.contact_create');
        }
            toastr()->success('Thêm mới thành công!', 'Thông báo', ['timeOut' => 2000]);
            return redirect()->route('get.contact_index');
    }


    public function customer_detail($id){

        $customer = Customer::findOrFail($id);
        $categories = Category::all();

        $model = new Customer();
        $status = $model->getStatus();

        return view('frontend.contact.customer_detail', compact('customer', 'categories', 'status'));
    }

    public function customer_edit($id)
    {
        $customer = Customer::findOrFail($id);
        $categories = Category::all();

        $model = new Customer();
        $status = $model->getStatus();

        return view('frontend.contact.customer_update', compact('customer', 'categories', 'status'));
    }
    public function customer_update(CustomerRequest $request, $id)
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
        return redirect()->route('get.contact_customer_detail', $id);
    }


    public function detail($id){

        $contact = Contact::findOrFail($id);

        $customers = Customer::all();

        $model = new Contact();
        $gender = $model->getGender();

        return view('frontend.contact.detail', compact('contact', 'customers', 'gender'));
    }

    public function edit($id)
    {
        $contact = Contact::findOrFail($id);

        $customers = Customer::all();
        $positions = Position::all();

        $model = new Contact();
        $gender = $model->getGender();

        return view('frontend.contact.update', compact('contact','customers', 'positions', 'gender'));
    }

    public function update(ContactRequest $request, $id){

        try{
            $data = $request->except('_token');
            $data =[
                'name' => $request->name,
                'customer_id' => $request->customer_id,
                'position_id' => $request->position_id,
                'email' => $request->email,
                'address' => $request->address,
                'gender' => $request->gender,
                'phone' => $request->phone,
                'birthday' => $request->birthday
        ];
                $data['updated_at'] = Carbon::now();
                Contact::find($id)->update($data);
            } catch (\Exception $exception) {
                Log::error("ERROR => ContactController@update => " . $exception->getMessage());
                toastr()->error('Cập nhật thất bại!', 'Thông báo', ['timeOut' => 2000]);
                return redirect()->route('get.contact_update', $id);
            }
            toastr()->success('Cập nhật thành công!', 'Thông báo', ['timeOut' => 2000]);
            return redirect()->route('get.contact_index');


            }

    public function delete(Request $request, $id)
    {
        try {
            $contact = Contact::findOrFail($id);
            if ($contact) $contact->delete();
        } catch (\Exception $exception) {
            toastr()->error('Xóa thất bại!', 'Thông báo', ['timeOut' => 2000]);
            Log::error("ERROR => ContactController@delete => " . $exception->getMessage());
        }
        toastr()->success('Xóa thành công!', 'Thông báo', ['timeOut' => 2000]);
        return redirect()->route('get.contact_index');
    }
}
