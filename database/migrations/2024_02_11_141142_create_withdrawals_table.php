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
        Schema::create('withdrawals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id")->index();
            $table->float("sum",15);
            $table->float("fee")->default(0);
            $table->string("payee_name");
            $table->string("address");
            $table->string("city");
            $table->string("state");
            $table->string("zip");
            $table->string("country");
            $table->string("bank_name")->nullable();
            $table->string("bank_address")->nullable();
            $table->string("bank_account")->nullable();
            $table->string("bank_aba")->nullable();
            $table->enum("status",[\App\Models\Withdrawal::STATUS_PAYED,\App\Models\Withdrawal::STATUS_PENDING,\App\Models\Withdrawal::STATUS_CANCEL])->default(\App\Models\Withdrawal::STATUS_PENDING);
            $table->enum("type",[\App\Models\Withdrawal::TYPE_WIRE_TRANSFER,\App\Models\Withdrawal::TYPE_CHECK]);
            $table->date("payed_at")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('withdrawals');
    }
};
