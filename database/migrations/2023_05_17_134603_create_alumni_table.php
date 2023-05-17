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
        Schema::create('alumni', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->string('jenis_kelamin', 15);
            $table->string('tempat_lahir', 50);
            $table->date('tanggal_lahir');
            $table->string('alamat', 191);
            $table->string('email', 50);
            $table->string('hp', 20);
            // $table->string('konsentrasi', 50);
            $table->date('tanggal_masuk');
            $table->string('bulan_tahun_lulus', 20);
            $table->string('status_kerja', 20);
            $table->string('is_pns', 10);
            $table->string('kesesuaian_pekerjaan', 20);
            $table->string('lama_menganggur', 50);
            $table->text('saran')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumni');
    }
};
