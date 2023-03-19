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
        Schema::create('ve', function (Blueprint $table) {
            $table->id();
            $table->foreignId('userid')->constrained('users')->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('idchuyenbay')->constrained('chuyenbay')->onUpdate('cascade')
                ->onDelete('cascade');
            $table -> date("ngaydatve");
            $table -> string("trangthai",255);
            $table -> decimal("tongtien",45);
            $table -> string("vitringoi",255);
            $table -> decimal("giamgia",45);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_ve');
    }
};
