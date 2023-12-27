<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as AuthUser;

class Book extends AuthUser
{
    use HasFactory;

    protected $table = 'tb_book';
    protected $primaryKey = 'id_book';

    protected $fillable = [
        'nama_book',
        'nama_author',
        'no_isbn',
        'tahun_terbit',
    ];
}