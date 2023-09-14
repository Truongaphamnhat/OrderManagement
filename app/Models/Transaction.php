<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transactions';
    protected $guarded = [''];

    /* Trạng thái đơn hàng:
         1: Giao dịch mới   (Giao dịch mới được tạo nhưng chưa được xử lý hoặc xác nhận)
         2: Đang xử lý      (Giao dịch đang được xử lý, gồm các việc như: xác nhận thông tin, xử lý thanh toán, chuẩn bị gói hàng,...)
         3: Thành công      (Giao dịch đã được thực hiện và đã được thanh toán)
         0: Đang xem xét    (Giao dịch đang trong quá trình xem xét và chờ xác minh bổ sung từ hệ thống hoặc bên thứ ba để bảo đảm tính hợp lệ)
        -1: Thất bại        (Giao dịch thất bại vì 1 lý do nào đó như: lỗi hệ thống hoặc lỗi số dư trong tài khoản)
        -2: Đã hủy          (Giao dịch đã hủy do yêu cầu của khách hàng hoặc lỗi hệ thống)
        -3: Hoàn trả        (Giao dịch đã được chuyển tiền nhưng do lý do nào đó không thể cung cấp hàng hóa)
    */

    const STATUS_DEFAULT = 1; // Giao dịch mới
    const STATUS_PROCESSING = 2; // Đang xử lý
    const STATUS_SUCCESS = 3; // Thành công
    const STATUS_PENDING_REVIEW = 0; // Đang xem xét
    const STATUS_FAILURE = -1; // Thất bại
    const STATUS_CANCEL = -2; // Đã hủy
    const STATUS_REFUND = -3; // Hoàn trả

    public $setStatus = [
        self::STATUS_DEFAULT => [
            'name' => 'Giao dịch mới',
            'class' => 'badge badge-light'
        ],
        self::STATUS_PROCESSING => [
            'name' => 'Đang xử lý',
            'class' => 'badge badge-primary'
        ],
        self::STATUS_SUCCESS => [
            'name' => 'Thành công',
            'class' => 'badge badge-success'
        ],
        self::STATUS_PENDING_REVIEW => [
            'name' => 'Đang xem xét',
            'class' => 'badge badge-warning'
        ],
        self::STATUS_FAILURE => [
            'name' => 'Thất bại',
            'class' => 'badge badge-danger'
        ],
        self::STATUS_CANCEL => [
            'name' => 'Đã hủy',
            'class' => 'badge badge-secondary'
        ],
        self::STATUS_REFUND => [
            'name' => 'Hoàn trả',
            'class' => 'badge badge-info'
        ],
    ];

    public function getStatus()
    {
        return Arr::get($this->setStatus, $this->status, []);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function contact()
    {
        return $this->belongsTo(Contact::class, 'contact_id');
    }

}
