<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TambahKolomDiTabelMahasiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
	    Schema::table('mahasiswa', function(Blueprint $table) {
            $table->date('tglLahir')->after('nama')->nullable();
            $table->string('email')->after('no_handphone')->unique()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mahasiswa', function (Blueprint $table){
            $table->dropColumn('tglLahir');
            $table->dropColumn('email');
        });
    }
}
