<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('po_number')->nullable();
            $table->tinyInteger('is_invoiced')->default(0);
            $table->timestamps();

            $table->integer('productline_id')->unsigned();
            /*            $table->integer('currency_id')->unsigned();*/

            $table->foreign('productline_id')->references('id')->on('productlines')
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
        Schema::drop('projects');
    }
}
