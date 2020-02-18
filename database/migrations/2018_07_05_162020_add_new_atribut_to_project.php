<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewAtributToProject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('projects', function (Blueprint $table) {
          $table->double('pasir')->after('karang_mati');
          $table->double('total')->after('pasir');
          $table->double('tutupan')->after('total');
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
          $table->dropColumn('pasir');
          $table->dropColumn('total');
          $table->dropColumn('tutupan');
      });
    }
}
