<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackingSlipDetailPackingSlipItemDetailPivotTable extends Migration
{
    public function up()
    {
        Schema::create('packing_slip_detail_packing_slip_item_detail', function (Blueprint $table) {
            $table->unsignedInteger('packing_slip_detail_id');
            $table->foreign('packing_slip_detail_id', 'packing_slip_detail_id_fk_2337682')->references('id')->on('packing_slip_details')->onDelete('cascade');
            $table->unsignedInteger('packing_slip_item_detail_id');
            $table->foreign('packing_slip_item_detail_id', 'packing_slip_item_detail_id_fk_2337682')->references('id')->on('packing_slip_item_details')->onDelete('cascade');
        });
    }
}
