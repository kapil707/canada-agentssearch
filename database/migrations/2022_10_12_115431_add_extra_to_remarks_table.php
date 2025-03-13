<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExtraToRemarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('form_remarks', function (Blueprint $table) {
            $table->string('total_fee')->nullable();
            $table->string('services')->nullable();
            $table->string('first_installment')->nullable();
            $table->string('first_payable_on')->nullable();
            $table->string('second_installment')->nullable();
            $table->string('second_payable_on')->nullable();
            $table->string('third_installment')->nullable();
            $table->string('third_payable_on')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('form_remarks', function (Blueprint $table) {
            $table->dropColumn('total_fee');
            $table->dropColumn('services');
            $table->dropColumn('first_installment');
            $table->dropColumn('first_payable_on');
            $table->dropColumn('second_installment');
            $table->dropColumn('second_payable_on');
            $table->dropColumn('third_installment');
            $table->dropColumn('third_payable_on');
        });
    }
}
