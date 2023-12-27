<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_book', function (Blueprint $table) {
            $table->id('id_book');
            $table->string('nama_book');
            $table->string('nama_author');
            $table->string('no_isbn');
            $table->string('tahun_terbit');
            $table->timestamps();
        });

        DB::table('tb_book')->insert([
            'nama_book' => 'Pemrograman Basis Data Di Matlab Dengan MySQL Dan Microsoft Access',
            'nama_author' => 'Rahmadya Trias H',
            'no_isbn'=> '9786026232700',
            'tahun_terbit'=> '2018',
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_book');
    }
}