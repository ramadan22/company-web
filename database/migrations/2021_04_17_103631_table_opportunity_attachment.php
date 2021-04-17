<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableOpportunityAttachment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('opportunity_attachment')) {
            Schema::create('opportunity_attachment', function (Blueprint $table) {
                $table->Increments('opportunity_attachment_id');
                $table->integer('opportunity_id');
                $table->integer('user_id');
                $table->string('file');
                $table->string('original_name');
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
        Schema::dropIfExists('opportunity_attachment');
    }
}
