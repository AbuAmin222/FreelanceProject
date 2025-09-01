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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();

            $table->string('fullname')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('experience', ['0-1', '1-3', '3-5', '5+']);
            $table->string('specializations');
            $table->string('phone')->nullable();
            $table->text('bio')->nullable();
            $table->string('identity');
            $table->string('identity_person');


            $table->timestamp('email_verified_at')->nullable();
            $table->string('verification_token', 64)->nullable();
            $table->timestamp('verification_token_sent_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
