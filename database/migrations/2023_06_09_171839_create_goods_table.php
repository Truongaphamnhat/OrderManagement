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
        Schema::create('goods', function (Blueprint $table) {
            $table->id();
            // $table->integer('order_id')->nullable();
            // $table->integer('contract_id')->nullable();
            // $table->string('goods_code')->nullable();
            $table->string('name')->nullable();
            $table->string('unit_id')->nullable(); // Địa chỉ văn phòng
            $table->string('manufacturer')->nullable();
            $table->string('origin')->nullable();
            $table->string('guarantee')->nullable();
            $table->string('describe')->nullable();
            $table->double('input_price')->nullable();
            $table->double('output_price')->nullable();
            $table->double('markup_ratio')->nullable();
            $table->double('tax')->nullable();
            $table->double('total')->nullable();
            $table->string('avatar')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('goods');
    }
};
