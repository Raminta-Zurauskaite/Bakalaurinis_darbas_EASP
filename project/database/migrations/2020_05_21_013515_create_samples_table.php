<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSamplesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('samples', function (Blueprint $table) {
            $table->id();
            $table->taisyklinga();
            $table->m0();
            $table->m1();
            $table->m2();
            $table->m3();
            $table->m4();
            $table->m5();
            $table->m6();
            $table->hmin();
            $table->hmax();
            $table->aa();
            $table->av();
            $table->ba();
            $table->bv();
            $table->h1();
            $table->h2();
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
        Schema::dropIfExists('samples');
    }
}
