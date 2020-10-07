<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;
class CreateCrmDocumentPurchasedItemPivotTable extends Migration
{
    public function up()
    {
        Schema::create('crm_document_purchased_item', function (Blueprint $table) {
            $table->unsignedInteger('crm_document_id');
            $table->foreign('crm_document_id', 'crm_document_id_fk_2337337')->references('id')->on('crm_documents')->onDelete('cascade');
            $table->unsignedInteger('purchased_item_id');
            $table->foreign('purchased_item_id', 'purchased_item_id_fk_2337337')->references('id')->on('purchased_items')->onDelete('cascade');
        });
    }
}
