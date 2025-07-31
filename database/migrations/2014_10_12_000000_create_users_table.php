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
            $table->enum("type",[\App\Models\User::ACCOUNT_PERSONAL,\App\Models\User::ACCOUNT_JOINT,\App\Models\User::ACCOUNT_BUSINESS])->default(\App\Models\User::ACCOUNT_PERSONAL);
            $table->string('password');
            $table->string("secret_question")->nullable();
            $table->string("secret_answer")->nullable();
            $table->string("username")->unique();
            $table->string("account")->nullable();
            $table->unsignedBigInteger("bank_id")->nullable();
            $table->boolean("bank")->default(false);
            $table->boolean("check")->default(false);
            $table->boolean("div_comp")->default(false);
            $table->boolean("approved")->default(false);
            $table->string("email");
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
