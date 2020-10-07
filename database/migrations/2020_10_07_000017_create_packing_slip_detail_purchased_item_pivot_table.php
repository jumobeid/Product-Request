<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackingSlipDetailPurchasedItemPivotTable extends Migration
{
    public function up()
    {
        Schema::create('packing_slip_detail_purchased_item', function (Blueprint $table) {
            $table->unsignedInteger('purchased_item_id');
            $table->foreign('purchased_item_id', 'purchased_item_id_fk_2337681')->references('id')->on('purchased_items')->onDelete('cascade');
            $table->unsignedInteger('packing_slip_detail_id');
            $table->foreign('packing_slip_detail_id', 'packing_slip_detail_id_fk_2337681')->references('id')->on('packing_slip_details')->onDelete('cascade');
        });
    }
}
