<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLinksToFormRemarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('form_remarks', function (Blueprint $table) {
            $table->string('link_1',2048)->nullable();
            $table->string('link_2',2048)->nullable();
            $table->string('link_3',2048)->nullable();
            $table->string('link_4',2048)->nullable();
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
            $table->dropColumn('link_1');
            $table->dropColumn('link_2');
            $table->dropColumn('link_3');
            $table->dropColumn('link_4');
        });
    }
}
