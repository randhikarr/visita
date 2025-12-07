<?php
/**
 * Visita - Laravel Migration
 * File: database/migrations/2024_12_07_create_museums_table.php
 * 
 * Cara run: php artisan migrate
 */

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
        Schema::create('museums', function (Blueprint $table) {
            $table->id();
            $table->string('nama_museum');
            $table->text('deskripsi')->nullable();
            $table->text('alamat')->nullable();
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 11, 8);
            $table->string('jam_operasional')->nullable();
            $table->string('harga_tiket')->nullable();
            $table->string('foto_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('museums');
    }
};