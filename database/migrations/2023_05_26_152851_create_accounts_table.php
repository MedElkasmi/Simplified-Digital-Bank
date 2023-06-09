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
        Schema::create('accounts', function (Blueprint $table) {

            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('account_type_id')->constrained()->onDelete('cascade');
            $table->string('account_number',12)->unique();
            $table->string('account_name');
            $table->string('currency_type');
            $table->decimal('initial_deposit', 8, 2);
            $table->decimal('balance', 8, 2);
            $table->decimal('withdrawal_limit', 8, 2);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
