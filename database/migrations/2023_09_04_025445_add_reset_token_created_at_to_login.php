<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('login', function (Blueprint $table) {
            $table->timestamp('reset_token_created_at')->nullable();
        });
    }
};
