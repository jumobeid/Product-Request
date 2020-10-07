<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrmDocumentSupplierPivotTable extends Migration
{
    public function up()
    {
        Schema::create('crm_document_supplier', function (Blueprint $table) {
            $table->unsignedInteger('supplier_id');
            $table->foreign('supplier_id', 'supplier_id_fk_2337666')->references('id')->on('suppliers')->onDelete('cascade');
            $table->unsignedInteger('crm_document_id');
            $table->foreign('crm_document_id', 'crm_document_id_fk_2337666')->references('id')->on('crm_documents')->onDelete('cascade');
        });
    }
}
