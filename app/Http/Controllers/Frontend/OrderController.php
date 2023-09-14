<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Http\Requests\GoodsRequest;
use App\Models\Order;
use App\Models\Goods;
use App\Models\Contact;
use App\Models\Customer;
use App\Models\Deliver;
use App\Models\Unit;
use App\Models\Status_order;
use App\Models\Order_goods_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class OrderController extends Controller
{
      // Chi tiết đơn hàng 
    public function detail(Request $request,$id){
        $unit = Unit::all();
        $status = Status_order::all();
        $orders = Order::findOrFail($id);
        $delivers = Deliver::all();
        $goods=Goods::all();
        $order_detail_has_id = Order_goods_detail::where('order_id', $id)->get();
        $customers = Customer::all(); 

        // Bắt đầu xử lý trạng thái đơn hàng
        if(isset($_POST['submit_previous'])){
            try {
                 $data=[
                'status' => $request->status - 1,
            ]; 
            Order::find($id)->update($data); 
            return redirect()->back();
            } catch (\Throwable $th) {
               Log::error("ERROR => OrderController@detail=> " . $exception->getMessage()); 
            }
        }

        if(isset($_POST['submit_next'])){
            try {
              
                 $data=[
                'status' => $request->status + 1,
            ]; 
            Order::find($id)->update($data); 
            return redirect()->back();
            } catch (\Throwable $th) {
               Log::error("ERROR => OrderController@detail=> " . $exception->getMessage()); 
            }
        }

        if(isset($_POST['submit_cancel'])){
            try {
              
                 $data=[
                'status' => $request->status,
            ]; 
            Order::find($id)->update($data); 
            return redirect()->back();
            } catch (\Throwable $th) {
               Log::error("ERROR => OrderController@detail=> " . $exception->getMessage()); 
            }
        }

        if(isset($_POST['submit_start'])){
            try {
              
                 $data=[
                'status' => $request->status,
            ]; 
            Order::find($id)->update($data); 
            return redirect()->back();
            } catch (\Throwable $th) {
               Log::error("ERROR => OrderController@detail=> " . $exception->getMessage()); 
            }
        }
        // Kết thúc thao tác xử lý đơn hàng

        return view('frontend.order.detail', compact('orders','goods','unit', 'status', 'delivers', 'order_detail_has_id'));
    }

    // Trang chính đơn hàng
    public function index(){
        $orders= Order::where('code_order','')->delete();
        Order_goods_detail::where('order_id',0)->delete();
        $customers = Customer::all(); 
        $contacts = Contact::all();
        $delivers = Deliver::all();
        $orders = Order::with('customer:id,name', 'contact:id,name', 'deliver:id,name');
        $orders = $orders->orderByDesc('id')->paginate(20); // Phân trang 20 dòng
        
        $viewData = [
            'orders' => $orders

        ];
        return view('frontend.order.index', $viewData);
    }



/////           ////////
///// HÀNG HÓA  ////////
/////           ////////

    // Hiển thị giao diện thêm hàng hóa
    public function goods_selecttion_create(){
        $units = Unit::all();
        $goods= Goods::with('unit:id,name',)->orderByDesc('id')->paginate(20);
       return view('frontend.order.form_goods',compact('units', 'goods'));

    }

    // Thêm hàng hóa vào csdl order_goods_detail
    public function goods_selecttion_store(Request $request){
        try {
            $data = $request->all();
        
            $data['created_at'] = Carbon::now();
            Order_goods_detail::create($data);

            $data1['created_at'] = Carbon::now();

            $data1['user_id'] = Auth::user()->id; // Hiển thị name người tạo đơn hàng
            Order::create($data1);
            
        } catch (\Exception $exception) {
            Log::error("ERROR => OrderController@goods_selecttion_store => " . $exception->getMessage());
         }
            return redirect()->route('get.order_create');
            
           
    }

    // Giao diện thêm hàng hóa theo id đơn hàng
    public function goods_selecttion_edit($id){
        $order = Order::findOrFail($id);
        $units = Unit::all();
        $goods= Goods::with('unit:id,name',)->orderByDesc('id')->paginate(20);

        return view('frontend.order.form_goods_update',compact('units', 'goods', 'order'));
    }

    // Cập nhật hàng hóa theo tương ứng id đơn hàng
    public function goods_selecttion_update(Request $request,$id){
        try {
                
            $data = $request->all();
            $data['created_at'] = Carbon::now();
         

            $order_detail = Order_goods_detail::create($data);
            
        } catch (\Exception $exception) {
            Log::error("ERROR => OrderController@goods_selecttion_update => " . $exception->getMessage());
            // toastr()->error('Thêm mới thất bại!', 'Thông báo', ['timeOut' => 2000]);
            return redirect()->route('get.order_goods_update', $id);
        }
            // toastr()->success('Thêm mới thành công!', 'Thông báo', ['timeOut' => 2000]);
            return redirect()->route('get.order_update', $id);
    }

    // Xóa hàng hóa 
    public function goods_delete(Request $request, $id)
    {
        try {
            $order_detail = Order_goods_detail::findOrFail($id);
            if ($order_detail) $order_detail->delete();
        } catch (\Exception $exception) {
            toastr()->error('Xóa thất bại!', 'Thông báo', ['timeOut' => 2000]);
            Log::error("ERROR => OrderController@goods_delete => " . $exception->getMessage());
        }
        toastr()->success('Xóa thành công!', 'Thông báo', ['timeOut' => 2000]);
        return redirect()->back();
    }

/////          //////
///// ĐƠN HÀNG //////
/////          //////
    public function create(){      
        
        $delivers = Deliver::all();
        $orders = Order::all();
        $orders1 = Order::where('id', Order::max('id'))->get();//Lấy giá trị id đơn hàng lớn nhất
        $customers= Customer::all();
        // $goods = Goods::all();
        $units = Unit::all();
        $goods= Goods::with('unit:id,name',)->orderByDesc('id')->paginate(20);
        $order_detail = Order_goods_detail::where('order_id', '0')->get();
        $order_goods_details = Order_goods_detail::all();
 
        $contacts = Contact::all();
       return view('frontend.order.create',compact('order_goods_details','orders1','order_detail', 'orders','customers','contacts', 'delivers', 'goods','units'));


    }

    public function store(OrderRequest $request)
    {
        // dd($request->all());
        try {
            $data = $request->except('_token', 'avatar');

            $data =[
                'customer_id' => $request->customer_id,
                'code_order' => $request->code_order,                
                'deliver_id' => $request->deliver_id,
                'contact_name' => $request->contact_name,
                'contact_phone' => $request->contact_phone,
                'guarantee' => $request->guarantee,
                'delivery_address' => $request->delivery_address,
                'delivery_time' => $request->delivery_time,
                'payments' => $request->payments,
                'order_date' => $request->order_date,
                'note' => $request->note,                
            ];
            $data['user_id'] = Auth::user()->id; // Hiển thị name người tạo đơn hàng
           
            Order::where('id', Order::max('id'))->update($data); 
            // Order::create($data);
            $data1=['order_id'=>$request->order_id,];
            Order_goods_detail::where('order_id', 0)->update($data1);
        
        } catch (\Exception $exception) {
            Log::error("ERROR => OrderController@store => " . $exception->getMessage());
            toastr()->error('Thêm mới thất bại!', 'Thông báo', ['timeOut' => 2000]);
            return redirect()->route('get.order_create');
        }
            toastr()->success('Thêm mới thành công!', 'Thông báo', ['timeOut' => 2000]);
            return redirect()->route('get.order_index');
          
    }


    public function edit($id){
        $order = Order::findOrFail($id);
        $delivers = Deliver::all();
       
        $orders1 = Order::where('id', Order::max('id'))->get();
        $customers= Customer::all();
        // $goods = Goods::all();
        $units = Unit::all();
        $goods= Goods::with('unit:id,name',)->orderByDesc('id')->paginate(20);
        $order_detail_has_id = Order_goods_detail::where('order_id', $id)->get();
        $order_detail_not_yet_id = Order_goods_detail::where('order_id', 0)->get();
 
        $contacts = Contact::all();

        return view('frontend.order.update', compact('order_detail_has_id','order_detail_not_yet_id','orders1','order','customers', 'delivers','goods', 'units', 'contacts')); 
    }

    public function update(OrderRequest $request, $id){

       try {
            $data = $request->except('_token', 'avatar');

            $data =[
                'customer_id' => $request->customer_id,
                'code_order' => $request->code_order,                
                'deliver_id' => $request->deliver_id,
                'contact_name' => $request->contact_name,
                'contact_phone' => $request->contact_phone,
                'guarantee' => $request->guarantee,
                'delivery_address' => $request->delivery_address,
                'delivery_time' => $request->delivery_time,
                'payments' => $request->payments,
                'order_date' => $request->order_date,
                'note' => $request->note,                
            ];
            $data['user_id'] = Auth::user()->id; // Hiển thị name người tạo đơn hàng
           
            Order::find($id)->update($data); 
            // Order::create($data);
            $data1=['order_id'=>$request->order_id,];
            Order_goods_detail::where('order_id', 0)->update($data1);
        
        } catch (\Exception $exception) {
            Log::error("ERROR => OrderController@update => " . $exception->getMessage());
            toastr()->error('Thêm mới thất bại!', 'Thông báo', ['timeOut' => 2000]);
            return redirect()->route('get.order_update', $id);
        }
            toastr()->success('Thêm mới thành công!', 'Thông báo', ['timeOut' => 2000]);
            return redirect()->route('get.order_index');
    }

       // Xóa đơn hàng 
    public function delete(Request $request, $id)
    {
        try {
            $order_detail_has_id = Order_goods_detail::where('order_id', $id);
            if($order_detail_has_id) $order_detail_has_id->delete();

            $orders = Order::findOrFail($id);
            if ($orders) $orders->delete();
        } catch (\Exception $exception) {
            Log::error("ERROR => OrderController@delete => " . $exception->getMessage());
            toastr()->error('Xóa thất bại!', 'Thông báo', ['timeOut' => 2000]);
           
        }
        toastr()->success('Xóa thành công!', 'Thông báo', ['timeOut' => 2000]);
        return redirect()->route('get.order_index');
    }
}
