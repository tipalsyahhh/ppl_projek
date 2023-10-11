<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNpmUts2Table extends Migration
{
    public function up()
    {
        Schema::create('npm_uts2', function (Blueprint $table) {
            $table->id();
            $table->string('uts2_f1');
            $table->string('uts2_f2');
            $table->string('uts2_f3');
            $table->unsignedBigInteger('id_uts1');
            $table->foreign('id_uts1')->references('id')->on('npm_uts1')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('npm_uts2');
    }
}

