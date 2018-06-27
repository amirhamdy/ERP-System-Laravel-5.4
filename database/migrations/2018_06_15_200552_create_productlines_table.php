<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductlinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productlines', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();

            $table->integer('customer_id')->unsigned();
            $table->integer('pricebook_id')->unsigned();
            /*$table->integer('currency_id')->unsigned();*/


            $table->foreign('customer_id')->references('id')->on('customers')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('pricebook_id')->references('id')->on('pricebooks')
                ->onUpdate('cascade')->onDelete('cascade');

            /*
            $table->foreign('currency_id')->references('id')->on('currencies')
                            ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('created_by')->references('id')->on('users')
                            ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('updated_by')->references('id')->on('users')
                            ->onUpdate('cascade')->onDelete('cascade');
            */

        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('productlines');
    }
}
