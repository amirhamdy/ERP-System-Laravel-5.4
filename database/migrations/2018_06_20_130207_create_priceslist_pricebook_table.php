<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePriceslistPricebookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('priceslist_pricebook', function (Blueprint $table) {
            $table->increments('id');
            $table->float('minimum_charge', 8, 2)->nullable();
            $table->float('unit_price', 8, 2);
            $table->timestamps();

            $table->integer('unit_id')->unsigned();
            $table->integer('job_type_id')->unsigned();
            $table->integer('source_language_id')->unsigned();
            $table->integer('target_language_id')->unsigned();
            $table->integer('pricebook_id')->unsigned();
            $table->integer('subject_matter_id')->unsigned();

            /*            $table->integer('created_by')->unsigned();
                        $table->integer('updated_by')->unsigned();*/

            $table->foreign('unit_id')->references('id')->on('units')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('job_type_id')->references('id')->on('job_types')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('source_language_id')->references('id')->on('languages')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('target_language_id')->references('id')->on('languages')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('pricebook_id')->references('id')->on('pricebooks')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('subject_matter_id')->references('id')->on('subject_matters')
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
        Schema::drop('priceslist_pricebook');
    }
}
