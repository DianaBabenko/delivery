<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->bigInteger('sender_id');
            $table->bigInteger('recipient_id');
            $table->bigInteger('from_department_id');
            $table->bigInteger('to_department_id');
            $table->dateTime('departure_date');
            $table->dateTime('delivery_date');
            $table->bigInteger('delivery_type_id');
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
        Schema::dropIfExists('invoices');
    }
}
