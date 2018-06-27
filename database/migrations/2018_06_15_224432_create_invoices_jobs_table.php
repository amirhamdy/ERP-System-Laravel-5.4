<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices_jobs', function (Blueprint $table) {
            $table->integer('invoice_id')->unsigned();
            $table->integer('job_id')->unsigned();
            $table->primary(['invoice_id', 'job_id']);

            $table->timestamps();

            $table->foreign('invoice_id')->references('id')->on('invoices')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('job_id')->references('id')->on('jobs')
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
        Schema::drop('invoices_jobs');
    }
}
