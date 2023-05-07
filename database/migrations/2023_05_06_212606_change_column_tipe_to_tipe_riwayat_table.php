<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('riwayat', function (Blueprint $table) {
            // $table->enum('tipe',['experience','education'])->change();
            DB::statement("ALTER TABLE riwayat MODIFY tipe ENUM('experience', 'education')");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('riwayat', function (Blueprint $table) {
        });
    }
};
