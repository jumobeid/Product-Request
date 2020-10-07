<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPurchasedItemsTable extends Migration
{
    public function up()
    {
        Schema::table('purchased_items', function (Blueprint $table) {
            $table->unsignedInteger('product_id');
            $table->foreign('product_id', 'product_fk_2337333')->references('id')->on('products');
        });
    }
}
