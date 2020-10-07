<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendingInvoicesTable extends Migration
{
    public function up()
    {
        Schema::create('pending_invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->float('pending_invoice_total_amount', 15, 2);
            $table->date('invoice_due_date')->nullable();
            $table->integer('discount_code')->nullable();
            $table->float('tax', 15, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
