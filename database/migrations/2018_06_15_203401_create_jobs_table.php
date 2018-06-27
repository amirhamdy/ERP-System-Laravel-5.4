<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->float('amount', 8, 2);
            $table->float('cost', 8, 2);
            $table->tinyInteger('minimum_used')->default('0');
            $table->timestamps();

            $table->integer('unit_id')->unsigned();
            $table->integer('job_type_id')->unsigned();
            $table->integer('source_language_id')->unsigned();
            $table->integer('target_language_id')->unsigned();
            $table->integer('project_id')->unsigned();


            $table->foreign('unit_id')->references('id')->on('units')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('job_type_id')->references('id')->on('job_types')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('source_language_id')->references('id')->on('languages')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('target_language_id')->references('id')->on('languages')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('project_id')->references('id')->on('projects')
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
        Schema::drop('jobs');
    }
}
