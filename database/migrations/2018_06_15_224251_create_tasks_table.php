<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->date('start_date');
            $table->date('end_date');
            $table->float('amount', 8, 2);
            $table->float('cost', 8, 2);
            $table->string('status', 50)->default('In Progress')->comment('Completed or Not');
            $table->tinyInteger('is_paid')->default(0)->comment('0 for Paid / 1 for Unpaid');
            $table->date('payment_date')->nullable();
            $table->text('waive_reason', 500)->nullable();
            $table->longText('waive_reason_other')->nullable();
            $table->longText('notes')->nullable();
            $table->timestamps();

            $table->integer('task_type_id')->unsigned();
            $table->integer('job_id')->unsigned();
            $table->integer('resource_id')->unsigned();
            $table->integer('unit_id')->unsigned();
            $table->integer('subject_matter_id')->unsigned();


            $table->foreign('task_type_id')->references('id')->on('task_types')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('unit_id')->references('id')->on('units')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('subject_matter_id')->references('id')->on('subject_matters')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('job_id')->references('id')->on('jobs')
                ->onUpdate('cascade')->onDelete('cascade');

            /*$table->foreign('resource_id')->references('id')->on('resources')
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
        Schema::drop('tasks');
    }
}
