<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePricebooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pricebooks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 500);
            $table->timestamps();

            $table->integer('currency_id')->unsigned();

            /*            $table->integer('created_by')->unsigned();
                        $table->integer('updated_by')->unsigned();*/

            $table->foreign('currency_id')->references('id')->on('currencies')
                ->onUpdate('cascade')->onDelete('cascade');

            /*            $table->foreign('created_by')->references('id')->on('users')
                            ->onUpdate('cascade')->onDelete('cascade');

                        $table->foreign('updated_by')->references('id')->on('users')
                            ->onUpdate('cascade')->onDelete('cascade');*/
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pricebooks');
    }
}
