<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Add2ColumnForOpportunityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('opportunity', function (Blueprint $table) {
          $table->date('job_expired')->after('other')->nullable();
          $table->date('interview_date_start')->after('job_expired')->nullable();
          $table->date('interview_date_end')->after('interview_date_start')->nullable();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
