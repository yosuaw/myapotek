<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicineTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicine_transaction', function (Blueprint $table) {
            $table->unsignedBigInteger('medicine_id');
            $table->unsignedBigInteger('transaction_id');
            $table->primary(['medicine_id','transaction_id']);
            $table->integer('quantity');
            $table->integer('subtotal');
            $table->foreign('medicine_id')->references('id')->on('medicines');
            $table->foreign('transaction_id')->references('id')->on('transactions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('medicine_transaction', function (Blueprint $table) {
            $table->dropForeign(['medicine_id']);
            $table->dropForeign(['transaction_id']);
        });
        Schema::dropIfExists('medicine_transaction');
    }
}
