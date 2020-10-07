<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrmDocumentPackingSlipDetailPivotTable extends Migration
{
    public function up()
    {
        Schema::create('crm_document_packing_slip_detail', function (Blueprint $table) {
            $table->unsignedInteger('crm_document_id');
            $table->foreign('crm_document_id', 'crm_document_id_fk_2337541')->references('id')->on('crm_documents')->onDelete('cascade');
            $table->unsignedInteger('packing_slip_detail_id');
            $table->foreign('packing_slip_detail_id', 'packing_slip_detail_id_fk_2337541')->references('id')->on('packing_slip_details')->onDelete('cascade');
        });
    }
}
