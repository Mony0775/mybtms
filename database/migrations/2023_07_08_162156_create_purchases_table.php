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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id');
            $table->integer('supplier_id');
            $table->integer('shipper_id');
            $table->date('purchase_date');
            $table->integer('payment_id');
            $table->float('shipping_cost');
            $table->date('shipping_date');
            $table->float('tax');
            $table->float('payment_amount');
            $table->float('sum_total');
            $table->float('discount');
            $table->string('trx_code')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
