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
        Schema::create('sanbay', function (Blueprint $table) {
            $table -> string("idsanbay")->primary();
            $table -> string("tensanbay",255);
            $table -> string("masanbay",255);
            $table -> string("thanhpho",255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sanbay');
    }
};
