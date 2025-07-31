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
        Schema::create('deposits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->enum("type",[\App\Models\Deposit::TYPE_WIRE_TRANSFER,\App\Models\Deposit::TYPE_CHECK,\App\Models\Deposit::TYPE_DIVIDEND]);
            $table->enum("status",[\App\Models\Deposit::STATUS_PENDING,\App\Models\Deposit::STATUS_CANCEL,\App\Models\Deposit::STATUS_PAYED])->default(\App\Models\Deposit::STATUS_PENDING);
            $table->float("sum",15);
            $table->float("fee",15)->default(0)->nullable();
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
        Schema::dropIfExists('deposits');
    }
};
