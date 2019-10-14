<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('expiration_date')->nullable();
            $table->enum('frequency', ['daily', 'weekly', 'monthly']);
            $table->enum('day', ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'])->nullable();
            $table->enum('day_interval', ['first', 'second', 'third', 'fourth'])->nullable();
            $table->integer('customer_id');
            $table->integer('address_id');
            $table->integer('widget_id');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade');
            $table->foreign('widget_id')->references('id')->on('widgets')->onDelete('cascade');
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
        Schema::dropIfExists('subscriptions');
    }
}
