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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('address')->nullable(); // Địa chỉ văn phòng
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('tax_code')->nullable();
            $table->string('description')->nullable();
            $table->string('avatar')->nullable();
            $table->string('slug')->nullable()->unique();
            $table->integer('status')->default(1); // Trạng thái Mới | Tiềm năng | Đã cọc ....
            $table->integer('user_id')->default(0); // Thuộc user nào tạo
            $table->integer('category_id')->default(0); // Thuộc danh mục nào
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
