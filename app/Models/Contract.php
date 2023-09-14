<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
class Contract extends Model
{
    use HasFactory;
    protected $table = 'contracts';
    protected $guarded = [''];

    /* Trạng thái đơn hàng:
         1: Hợp đồng mới        (Đây là trạng thái mà hợp đồng đã thêm hàng hóa, hoàn thành tất cả các điều kiện cần thiết và có hiệu lực pháp lý. Từ thời điểm này, các bên trong hợp đồng phải tuân thủ các điều khoản và điều kiện đã được thỏa thuận.)
         2: Chưa thực hiện      (Trạng thái chưa thực hiện có thể do nguyên nhân nào đó như chưa cọc tiền hoặc không thỏa 1 điều khoản tiền hợp đồng nào đó)
         3: Đang thực hiện      (Trạng thái này xảy ra khi các bên đang thực hiện các cam kết và trách nhiệm trong hợp đồng. Các bên phải đáp ứng và thực hiện các điều khoản đã được thỏa thuận.)
         4: Đã hoàn tất         (Hợp đồng đã được thực hiện, đã hoàn tất tất cả các điều khoản và đã đến hạn kết thúc).
         0: Chưa thêm hàng hóa  (Hợp đồng mới được lập dưới trạng thái chưa có hàng hóa).
        -1: Thỏa thuận thất bại (Trạng thái này xảy ra khi các bên không đồng ý với các điều khoản và điều kiện của hợp đồng. Trong trường hợp này, hợp đồng không được ký kết và không có hiệu lực.)
        -2: Đã hủy bỏ           (Trạng thái này xảy ra khi một hoặc cả hai bên trong hợp đồng đồng ý chấm dứt hợp đồng trước khi nó hoàn thành. Trong trạng thái này, hợp đồng không còn hiệu lực và không có cam kết nào cần phải thực hiện.)
        -3: Đã chấm dứt         (Hợp đồng có thể bị chấm dứt nếu một trong các bên không tuân thủ các điều khoản và điều kiện hoặc có sự vi phạm pháp lý khác. Trong trạng thái này, hợp đồng không còn hiệu lực và các cam kết không còn áp dụng.)
        -4: Đang thương lượng   (Trạng thái này xảy ra khi các bên đang thảo luận, đàm phán và đưa ra các điều khoản mới để hoàn thiện hợp đồng. Trong giai đoạn này, hợp đồng chưa được ký kết và không có hiệu lực.)
    */

    const STATUS_DEFAULT = 1; // Hợp đồng mới
    const STATUS_NOTYETEXECUTED = 2; // Chưa thực hiện
    const STATUS_PERFORMANCE = 3; // Đang thực hiện
    const STATUS_FINISHED = 4; // Đã hoàn tất
    const STATUS_NOGOODS = 0; // Chưa thêm hàng hóa
    const STATUS_UNARGREED = -1; // Thỏa thuận thất bại
    const STATUS_CANCELED = -2; // Đã hủy bỏ
    const STATUS_TERMINATED = -3; // Đã chấm dứt
    const STATUS_NEGOTIATION = -4; // Đang thương lượng

    public $setStatus = [
        self::STATUS_DEFAULT => [
            'name' => 'Hợp đồng mới',
            'class' => 'badge badge-primary'
        ],
        self::STATUS_NOTYETEXECUTED => [
            'name' => 'Chưa thực hiện',
            'class' => 'badge badge-secondary'
        ],
        self::STATUS_PERFORMANCE => [
            'name' => 'Đang thực hiện',
            'class' => 'badge badge-info'
        ],
        self::STATUS_FINISHED => [
            'name' => 'Đã hoàn tất',
            'class' => 'badge badge-success'
        ],
        self::STATUS_NOGOODS => [
            'name' => 'Chưa thêm hàng hóa',
            'class' => 'badge badge-warning'
        ],
        self::STATUS_UNARGREED => [
            'name' => 'Thỏa thuận thất bại',
            'class' => 'badge badge-danger'
        ],
        self::STATUS_CANCELED => [
            'name' => 'Đã hủy bỏ',
            'class' => 'badge badge-danger'
        ],
        self::STATUS_TERMINATED => [
            'name' => 'Đã chấm dứt',
            'class' => 'badge badge-danger'
        ],
        self::STATUS_NEGOTIATION => [
            'name' => 'Đang thương lượng',
            'class' => 'badge badge-dark'
        ]
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

    public function goods()
    {
        return $this->belongsTo(Goods::class, 'goods_id');
    }

    public function contract_type()
    {
        return $this->belongsTo(ContractType::class, 'contract_type_id');
    }

}
