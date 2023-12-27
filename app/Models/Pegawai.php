<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pegawai extends Model
{
    use HasFactory;

    protected $table    = 'pegawai';
    protected $fillable = [
        'nama_pegawai',
        'no_telp',
        'email',
        'nik',
        'tgl_lahir',
        'alamat',
    ];

    protected $hidden = [];
}