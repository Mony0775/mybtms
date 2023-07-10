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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id');
            $table->integer('customer_id');
            $table->date('order_date');
            $table->integer('shipper_id');
            $table->integer('payment_id');
            $table->integer('shipping_cost');
            $table->date('shipping_date');
            $table->float('tax');
            $table->float('payment_amount');
            $table->float('discount');
            $table->float('sum_total');
            $table->string('trx_code')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
