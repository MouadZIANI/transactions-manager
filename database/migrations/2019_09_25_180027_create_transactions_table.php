<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('to_name')->nullable();
            $table->string('to_email')->nullable();
            $table->string('to_phone_number')->nullable();
            $table->string('transaction_code')->nullable();
            $table->decimal('total')->nullable();
            $table->dateTime('sent_at')->nullable();
            $table->integer('client_id')->nullable()->unsigned();
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->integer('operator_id')->nullable()->unsigned();
            $table->foreign('operator_id')->references('id')->on('operators')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
