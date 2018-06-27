<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskTypesJobTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_types_job_types', function (Blueprint $table) {
            $table->integer('job_type_id')->unsigned();
            $table->integer('task_type_id')->unsigned();
            $table->primary(['job_type_id', 'task_type_id']);
            $table->timestamps();

            $table->foreign('job_type_id')->references('id')->on('job_types')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('task_type_id')->references('id')->on('task_types')
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
        Schema::drop('task_types_job_types');
    }
}
