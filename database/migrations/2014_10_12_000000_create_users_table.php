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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('referral_code')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('is_verified')->default(0);
            $table->bigInteger('phone')->nullable();
            $table->date('birth_date');
            $table->string('gender');
            $table->string('pancard');
            $table->string('state');
            $table->string('city');
            $table->string('bank_name');
            $table->string('account_no');
            $table->string('ifsc_code');
            $table->integer('pincode');
            $table->string('address');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
