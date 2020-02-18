<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDaerahIDToProject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('projects', function (Blueprint $table) {
          $table->integer('daerah_id')->nullable()->after('tutupan')->unsigned();
          $table->foreign('daerah_id')->references('id')->on('daerahs')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('projects', function (Blueprint $table) {
          $table->dropColumn('daerah_id');
      });
    }
}
