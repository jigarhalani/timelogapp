<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FollowupLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('followups',function(Blueprint $table){
            $table->increments('id');
            $table->integer('lead_id');
            $table->dateTime('followup_time');
            $table->text('notes');
            $table->tinyInteger('is_active')->default(1)->comment("0 for inactive, 1 for active");
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
        Schema::dropIfExists('followups');
    }
}
