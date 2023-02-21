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
        Schema::create('giave', function (Blueprint $table) {
            $table -> string("idgiave")->primary();
            $table -> string("idchuyenbay",255);
            $table -> string("vethuong",255);
            $table -> string("vevip",255);
            $table->timestamps();
            $table->foreign("idchuyenbay")->references("idchuyenbay")->on("chuyenbay");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('giave');
    }
};
