<?php

use App\Models\Transfer;
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
            $table->unsignedBigInteger("user_id")->index();
            $table->float("sum",15);
            $table->float("fee")->nullable();
            $table->enum("type",[Transfer::TYPE_DEPOSIT, Transfer::TYPE_WITHDRAWAL, Transfer::TYPE_DIVIDEND]);
            $table->enum("name",[
                Transfer::NAME_CHECK,
                Transfer::NAME_DIVIDEND,
                Transfer::NAME_DIVIDEND_FEE,
                Transfer::NAME_FEE,
                Transfer::NAME_WIRE_TRANSFER
            ])->nullable();
            $table->unsignedBigInteger("object_id");
            $table->timestamps();
            $table->softDeletes();
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
