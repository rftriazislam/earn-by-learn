<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_details', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('method_name', 10);
            $table->string('account_number', 100);
            $table->string('upload_screenshort');
            $table->tinyInteger('c_status')->default(0);

            $table->integer('first_mentor_id');
            $table->string('first_method_name', 10);
            $table->string('first_account_number', 100);
            $table->string('first_upload_screenshort');
            $table->tinyInteger('m1_status')->default(0);

            $table->integer('second_mentor_id');
            $table->string('second_method_name', 10);
            $table->string('second_account_number', 100);
            $table->string('second_upload_screenshort');
            $table->tinyInteger('m2_status')->default(0);

            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_details');
    }
}