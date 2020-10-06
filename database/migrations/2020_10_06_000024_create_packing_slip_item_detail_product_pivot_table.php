<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackingSlipItemDetailProductPivotTable extends Migration
{
    public function up()
    {
        Schema::create('packing_slip_item_detail_product', function (Blueprint $table) {
            $table->unsignedInteger('product_id');
            $table->foreign('product_id', 'product_id_fk_2337883')->references('id')->on('products')->onDelete('cascade');
            $table->unsignedInteger('packing_slip_item_detail_id');
            $table->foreign('packing_slip_item_detail_id', 'packing_slip_item_detail_id_fk_2337883')->references('id')->on('packing_slip_item_details')->onDelete('cascade');
        });
    }
}
