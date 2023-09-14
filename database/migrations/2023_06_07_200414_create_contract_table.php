<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();     //Người tạo (Chủ sở hữu)
            $table->integer('customer_id')->nullable(); //Khách hàng
            $table->integer('contact_id')->nullable();  //Liên hệ
            $table->integer('value')->default(0)->nullable();    // Giá trị hợp đồng
            $table->dateTime('start_day')->nullable();  // Ngày bắt đầu
            $table->dateTime('finish_day')->nullable();  // Ngày kết thúc
            $table->integer('status')->nullable();  // Trạng thái
            $table->string('name')->nullable(); //Tên hợp đồng
            $table->int('contract_type_id')->nullable();    //Loại hợp đồng
            $table->string('payments')->nullable();     //Hình thức thanh toán
            $table->string('transportation')->nullable();     //Hình thức vận chuyển
            $table->string('phone')->nullable();    // Số điện thoại hiện tại của user (có thể sửa 1 số khác ko nhất thiết số đã lưu trong csdl)
            $table->dateTime('payment_date')->nullable();   // Ngày thanh toán
            $table->string('payment_type')->nullable();   // Loại thanh toán
            $table->string('payment_amount')->default(0)->nullable();   // Số tiền đã thanh toán
            $table->string('debt')->default(0)->nullable();   // Số nợ
            $table->string('revenue_for')->nullable();  // Doanh số tính cho
            $table->string('note')->nullable();     // Ghi chú
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_name');
    }
};
