<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackingSlipItemDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('packing_slip_item_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('received_item_qty');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
