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
        Schema::create('cskh', function (Blueprint $table) {
            $table -> string("userid")->primary();
            $table -> string("idlienhe",255);
            $table->timestamps();
            $table->foreign("userid")->references("userid")->on("users");
            $table->foreign("idlienhe")->references("idlienhe")->on("lienhe");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cskh');
    }
};
