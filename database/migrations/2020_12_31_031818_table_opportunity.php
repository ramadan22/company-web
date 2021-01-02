<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableOpportunity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('opportunity')) {
            Schema::create('opportunity', function (Blueprint $table) {
                $table->Increments('opportunity_id');
                $table->string('title', 200);
                $table->text('description');
                $table->string('image', 200);
                $table->integer('point_required');
                $table->json('other');
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
        Schema::dropIfExists('opportunity');
    }
}
