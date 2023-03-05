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
        Schema::create('users', function (Blueprint $table) {
            $table -> string("userid")->primary();
            $table -> string("hotem",255);
            $table -> string("email",255);
            $table -> string("email-verified-at",255);
            $table -> string("password",16);
            $table -> integer("role");
            $table -> string("avatar",255);
            $table -> string("sdt",10);
            $table -> string("diachi",255);
            $table -> float("dambay");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
