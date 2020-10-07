<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackingSlipDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('packing_slip_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('packing_slip_number');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
