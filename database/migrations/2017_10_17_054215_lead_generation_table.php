<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LeadGenerationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('leads', function (Blueprint $table) {

                 $table->increments('id');
                 $table->string('name1')->nullable();
                 $table->string('name2')->nullable();
                 $table->string('company_url')->unique();
                 $table->string('company_name')->nullable();
                 $table->string('contact_no1')->nullable();
                 $table->string('contact_no2')->nullable();
                 $table->string('email1')->nullable();
                 $table->string('email2')->nullable();
                 $table->string('country');
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
        Schema::dropIfExists('lead');
    }
}
