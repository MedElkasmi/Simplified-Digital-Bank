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
            $table->unsignedBigInteger('from_account_id'); 
            $table->unsignedBigInteger('to_account_id'); 
            $table->unsignedBigInteger('transaction_type_id'); 
            $table->decimal('amount', 8, 2);
            $table->string('transaction_number',36)->unique();
            $table->timestamps(); 
            
            // Setting up the foreign key constraints
            $table->foreign('from_account_id')->references('id')->on('accounts');
            $table->foreign('to_account_id')->references('id')->on('accounts');
            $table->foreign('transaction_type_id')->references('id')->on('transaction_types');
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
