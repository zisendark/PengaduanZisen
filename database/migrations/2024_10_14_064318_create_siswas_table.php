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
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('pelapor');
            $table->string('terlapor');
            $table->string('kelas');
            $table->string('laporan');
            $table->string('bukti')->nullable(); //untuk menyimpan foto laporan
            $table->string('status')->default('sedang dalam  tinjauan'); 
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
