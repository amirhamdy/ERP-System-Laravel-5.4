<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->string('status', 50)->default('Not Paid')->comment('Paid or Not Paid');
            $table->float('cost', 8, 2);
            $table->float('cost_in_usd', 8, 2);
            $table->longText('notes');
            $table->timestamps();

            $table->integer('customer_id')->unsigned();
            $table->integer('productline_id')->unsigned();
            $table->integer('project_id')->unsigned();
            $table->integer('bank_id')->unsigned();


            $table->foreign('customer_id')->references('id')->on('customers')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('productline_id')->references('id')->on('productlines')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('project_id')->references('id')->on('projects')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('bank_id')->references('id')->on('banks')
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
        Schema::drop('invoices');
    }
}
