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
        Schema::create('representers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('address')->nullable(); // Địa chỉ cụ thể
            $table->integer('province_id')->default(0)->nullable();
            $table->integer('district_id')->default(0)->nullable();
            $table->integer('ward_id')->default(0)->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            // $table->string('tax_code')->nullable();
            $table->string('description')->nullable(); // Mô tả chức vụ
            $table->string('avatar')->nullable();
            $table->string('slug')->nullable()->unique();
            // $table->integer('status')->default(1); // Trạng thái Mới | Tiềm năng | Đã cọc ....
            $table->integer('user_id')->default(0); // Thuộc user nào tạo
            $table->integer('customer_id')->default(0); // Thuộc khách hàng nào
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('representers');
    }
};
