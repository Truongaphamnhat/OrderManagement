<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();                     // Tên giao dịch
            $table->string('description')->nullable();  // Mô tả
            $table->integer('user_id')->nullable();      // Người phụ trách (tài khoản đang đăng nhập)
            $table->integer('customer_id')->nullable();  // Khách hàng
            $table->string('transaction_type')->nullable();     // Loại giao dịch
            $table->integer('contact_id')->nullable();   // Người liên hệ
            $table->dateTime('start_day')->default(DB::raw('CURRENT_TIMESTAMP'));   // Ngày bắt đầu
            $table->dateTime('deadline_date')->nullable()->default(DB::raw('CURRENT_TIMESTAMP')); // Hạn hoàn thành
            $table->dateTime('finish_day')->default(DB::raw('CURRENT_TIMESTAMP'));  // Ngày kết thúc
            $table->integer('status')->default(1)->nullable();      // Trạng thái
            $table->string('result')->nullable();      // Kết quả
            $table->integer('priority')->nullable();    // Ưu tiên
            $table->string('transaction_address')->nullable();    // Địa chỉ giao dịch
            $table->string('document')->nullable(); // Tài liệu liên quan
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
