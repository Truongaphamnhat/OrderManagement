<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\TransactionRequest;
use App\Models\Transaction;
use App\Models\Customer;
use App\Models\Contact;
use App\Models\Position;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Psy\Readline\Hoa\Console;

class TransactionController extends Controller
{
    public function index(){
        $transactions = Transaction::with('customer:id,name','user:id,name','contact:id,name');
        $transactions = $transactions
            ->orderByDesc('id')
            ->get();

        $model = new Transaction();
        $status = $model->getStatus();

        $viewData = [
            'transactions' => $transactions,
            'transaction_status' => $status
        ];

        return view('frontend.transaction.index', $viewData);
    }

    public function create()
    {
        $user = User::all();
        $customers = Customer::all();
        $contacts = Contact::all();
        $model = new Transaction();
        $status = $model->getStatus();

        return view('frontend.transaction.create', compact('customers', 'contacts', 'status', 'user'));
    }

    public function store(TransactionRequest $request)
    {
        try {
            $data = $request->all();
            // $user = User::findOrFail($data['user_id']);
            // dd($data);
            $customers = Customer::findOrFail($data['customer_id']);
            $contacts = Contact::findOrFail($data['contact_id']);
            // Lưu tệp tin vào thư mục lưu trữ
            if ($request->hasFile('document')) {
                $file = $request->file('document');
                $fileName = $file->getClientOriginalName();
                $filePath = $file->storeAs('documents', $fileName, 'public');
                $data['document'] = $filePath;
            }

            $data['user_id'] = Auth::user()->id; // Hiển thị name người tạo customer

            $transaction = Transaction::create($data);

            toastr()->success('Thêm mới thành công!', 'Thông báo', ['timeOut' => 2000]);

        } catch (\Exception $exception) {
            Log::error("ERROR => TransactionController@store => " . $exception->getMessage());
            toastr()->error('Thêm mới thất bại!', 'Thông báo', ['timeOut' => 2000]);
            return redirect()->route('get.transaction_create');
        }
        return redirect()->route('get.transaction_index');
    }


    public function detail($id)
    {
        $transaction = Transaction::findOrFail($id);
        $customer = Customer::all();
        $contact = Contact::all();

        $model = new Transaction();
        $status = $model->getStatus();

        return view('frontend.transaction.detail', compact('transaction', 'customer', 'status', 'contact'));
    }

    public function edit($id){

        $transaction = Transaction::findOrFail($id);
        $customers = Customer::all();
        $contacts = Contact::all();
        $positions = Position::all();
        $model = new Transaction();
        $status = $model->getStatus();

        return view('frontend.transaction.update', compact('transaction', 'customers', 'status', 'contacts', 'positions'));
    }

    public function update(TransactionRequest $request, $id)
    {
        try {
            $data = $request->all();
            $data['updated_at'] = Carbon::now();

            // $customer = Customer::findOrFail($data['customer_id']);

            Transaction::find($id)->update($data);

        } catch (\Exception $exception) {
            Log::error("ERROR => TransactionController@update => " . $exception->getMessage());
            toastr()->error('Cập nhật giao dịch thất bại!', 'Thông báo', ['timeOut' => 2000]);
            return redirect()->route('get.transaction_update', $id);
        }

        toastr()->success('Cập nhật giao dịch thành công!', 'Thông báo', ['timeOut' => 2000]);
        return redirect()->route('get.transaction_index');
    }


    public function delete(Request $request, $id)
    {
        try {
            $transaction = Transaction::findOrFail($id);
            if ($transaction) $transaction->delete();
        } catch (\Exception $exception) {
            toastr()->error('Xóa giao dịch thất bại!', 'Thông báo', ['timeOut' => 2000]);
            Log::error("ERROR => TransactionController@delete => " . $exception->getMessage());
        }
        toastr()->success('Xóa giao dịch thành công!', 'Thông báo', ['timeOut' => 2000]);
        return redirect()->route('get.transaction_index');
    }
}
