<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractGoodsDetailTable extends Migration
{
    public function up()
    {
        Schema::create('contract_goods_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contract_id')->nullable();
            $table->unsignedBigInteger('goods_id')->nullable();
            $table->timestamps();

            $table->foreign('contract_id')->references('id')->on('contracts');
            $table->foreign('goods_id')->references('id')->on('goods');
        });
    }

    public function down()
    {
        Schema::dropIfExists('contract_goods_detail');
    }
}
