<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableApplyOpportunity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('opportunity_apply')) {
            Schema::create('opportunity_apply', function (Blueprint $table) {
                $table->Increments('opportunity_apply_id');
                $table->integer('opportunity_id');
                $table->integer('user_id');
                $table->integer('point_result');
                $table->softDeletes();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apply_opportunity');
    }
}
