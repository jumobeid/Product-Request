<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCrmDocumentsTable extends Migration
{
    public function up()
    {
        Schema::table('crm_documents', function (Blueprint $table) {
            $table->unsignedInteger('customer_id')->nullable();
            $table->foreign('customer_id', 'customer_fk_2337323')->references('id')->on('crm_customers');
            $table->unsignedInteger('pending_invoice_id')->nullable();
            $table->foreign('pending_invoice_id', 'pending_invoice_fk_2337469')->references('id')->on('pending_invoices');
        });
    }
}
