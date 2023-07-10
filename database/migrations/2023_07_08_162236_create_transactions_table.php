<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id');
            $table->integer('customer_id')->nullable()->default(null);
            $table->integer('supplier_id')->nullable()->default(null);
            $table->integer('shipper_id');
            $table->integer('payment_id');
            $table->float('shipping_cost');
            $table->date('shipping_date');
            $table->float('tax');
            $table->float('discount');
            $table->float('total_price');
            $table->string('type');
            $table->date('transaction_date');
            $table->date('order_date')->nullable();
            $table->date('purchase_date')->nullable();
            $table->string('trx_code');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
