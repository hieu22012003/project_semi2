<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('maybay', function (Blueprint $table) {
            $table -> string("idmaybay")->primary();
            $table -> string("hangmaybay",255);
            $table -> string("tenmaybay",255);
            $table -> string("ghethuong",255);
            $table -> string("ghevip",255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maybay');
    }
};
