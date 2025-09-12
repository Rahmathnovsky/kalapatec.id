<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('candidates', function (Blueprint $table) {
            $table->string('pob');
            $table->string('marital_status');
            $table->string('religion');
            $table->string('province');
            $table->string('regency');
            $table->string('education');
            $table->string('cv')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('candidates', function (Blueprint $table) {
            $table->dropColumn('pob');
            $table->dropColumn('marital_status');
            $table->dropColumn('religion');
            $table->dropColumn('province');
            $table->dropColumn('regency');
            $table->dropColumn('education');
            $table->dropColumn('cv');
        });
    }
};
