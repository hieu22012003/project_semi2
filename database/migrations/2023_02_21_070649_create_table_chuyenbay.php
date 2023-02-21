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
        Schema::create('chuyenbay', function (Blueprint $table) {
            $table -> string("idchuyenbay")->primary();
            $table -> string("idmaybay",255);
            $table -> string("idtuyenbay",255);
            $table -> string("ngaydi",255);
            $table -> string("ngayden",255);
            $table -> string("trangthai",255);
            $table -> string("quangduong",255);
            $table -> string("sanbaydi",10);
            $table -> string("sanbayden",255);
            $table->timestamps();
            $table->foreign("idmaybay")->references("idmaybay")->on("maybay");
            $table->foreign("sanbaydi")->references("idsanbay")->on("sanbay");
            $table->foreign("sanbayden")->references("idsanbay")->on("sanbay");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chuyenbay');
    }
};
