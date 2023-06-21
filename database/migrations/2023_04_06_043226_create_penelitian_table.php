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
    Schema::create('penelitian', function (Blueprint $table) {
      $table->id();
      $table->string('judul');
      $table->string('nama_dosen');
      $table->string('tahun', 4);
      $table->string('link');
      $table->enum('kategori', ['penelitian', 'pengabdian']);
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('penelitian');
  }
};
