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
        Schema::table('tenants', function (Blueprint $table) {
            $table->string('nama_lengkap')->nullable()->after('room_id');
            $table->string('whatsapp')->nullable()->after('nama_lengkap');
            $table->string('email')->nullable()->after('whatsapp');
            $table->string('ktp_number')->nullable()->after('email');
            $table->string('foto_ktp')->nullable()->after('ktp_number');
            $table->string('bukti_pembayaran')->nullable()->after('foto_ktp');
            $table->string('durasi')->nullable()->after('end_date');
            // Modifying ENUM column natively in MySQL/MariaDB is sometimes problematic
            // We'll change the status column to string to allow 'pending' and 'rejected'
            $table->string('status')->default('pending')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tenants', function (Blueprint $table) {
            $table->dropColumn([
                'nama_lengkap',
                'whatsapp',
                'email',
                'ktp_number',
                'foto_ktp',
                'bukti_pembayaran',
                'durasi'
            ]);
            // Reverting status to ENUM can be tricky, so we'll just leave it as string in rollback
        });
    }
};
