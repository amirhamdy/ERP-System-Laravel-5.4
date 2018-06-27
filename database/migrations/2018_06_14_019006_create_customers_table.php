<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->string('fax', 500)->nullable();
            $table->string('status', 500)->nullable();
            $table->string('city', 200)->nullable();
            $table->string('address1', 500)->nullable();
            $table->string('address2', 500)->nullable();
            $table->string('postal_code', 500)->nullable();
            $table->string('billing_address', 500)->nullable();
            $table->string('website', 500)->nullable();
            $table->string('rating', 500)->nullable();
            $table->timestamps();

            /*            $table->integer('pricebook_id')->nullable();*/

            $table->integer('region_id')->unsigned();
            $table->integer('country_id')->unsigned();
            $table->integer('industry_id')->unsigned();

            /*            $table->integer('created_by')->unsigned();
                        $table->integer('updated_by')->unsigned();*/

            $table->foreign('region_id')->references('id')->on('regions')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('country_id')->references('id')->on('countries')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('industry_id')->references('id')->on('industries')
                ->onUpdate('cascade')->onDelete('cascade');

            /*            $table->foreign('pricebook_id')->references('id')->on('pricebooks')
                            ->onUpdate('cascade')->onDelete('cascade');*/

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
        Schema::drop('customers');
    }
}
