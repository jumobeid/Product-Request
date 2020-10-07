<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendingInvoiceSupplierPivotTable extends Migration
{
    public function up()
    {
        Schema::create('pending_invoice_supplier', function (Blueprint $table) {
            $table->unsignedInteger('supplier_id');
            $table->foreign('supplier_id', 'supplier_id_fk_2337470')->references('id')->on('suppliers')->onDelete('cascade');
            $table->unsignedInteger('pending_invoice_id');
            $table->foreign('pending_invoice_id', 'pending_invoice_id_fk_2337470')->references('id')->on('pending_invoices')->onDelete('cascade');
        });
    }
}
