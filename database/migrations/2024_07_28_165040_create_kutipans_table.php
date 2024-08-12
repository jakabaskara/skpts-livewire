<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kutipan', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('skpts_id')->constrained('skpts', 'id')->cascadeOnDelete();
            $table->string('no_kutipan');
            $table->string('nik_sap');
            $table->string('nama');
            $table->string('jabatan_lama');
            $table->string('jabatan_baru');
            $table->string('keterangan');
            $table->string('status')->nullable();
            $table->string('file_kutipan');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kutipans');
    }
};
