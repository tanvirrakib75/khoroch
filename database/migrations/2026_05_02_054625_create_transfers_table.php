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
        Schema::create('transfers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); 
            $table->foreign('user_id')->references('id')->on('users') ->onDelete('cascade');
            $table->string('from_account');
            $table->string('from_account_number')->nullable();
            $table->string('to_account');
            $table->string('to_account_number')->nullable();
            $table->decimal('amount',15,2);
            $table->decimal('charge',15,2)->default(0);
            $table->string('transfer_type');
            $table->date('date');
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transfers');
    }
};
