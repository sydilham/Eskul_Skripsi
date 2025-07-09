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
        Schema::table('pendaftaran_eskuls', function (Blueprint $table) {
        
            $table->foreignId('user_id')->nullable()->change();

            $table->string('nama')->default("");
            $table->string('nisn')->default("");
            $table->string('kelas')->default("");
            $table->string('tgl_lahir');
            $table->string('jenis_kelamin');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
