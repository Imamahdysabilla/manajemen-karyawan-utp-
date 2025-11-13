<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('karyawans', function (Blueprint $table) {
            // Hapus constraint lama jika ada
            try {
                $table->dropForeign(['departemen_id']);
            } catch (\Exception $e) {}

            // Paksa ubah kolom jadi nullable
            \DB::statement('ALTER TABLE karyawans ALTER COLUMN departemen_id DROP NOT NULL;');

            // Tambahkan kembali foreign key dengan onDelete set null
            $table->foreign('departemen_id')
                  ->references('id')
                  ->on('departemens')
                  ->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('karyawans', function (Blueprint $table) {
            $table->dropForeign(['departemen_id']);
            \DB::statement('ALTER TABLE karyawans ALTER COLUMN departemen_id SET NOT NULL;');
            $table->foreign('departemen_id')->references('id')->on('departemens');
        });
    }
};
