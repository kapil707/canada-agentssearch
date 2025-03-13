<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormRemarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_remarks', function (Blueprint $table) {
            $table->id();
            $table->text('remark');
            $table->string('quoted_fee')->nullable();
            $table->date('next_follow')->nullable();
            $table->foreignId('form_submission_id')->constrained();
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
        Schema::dropIfExists('form_remarks');
    }
}
