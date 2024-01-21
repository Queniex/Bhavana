<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    // use HasFactory;
    protected $table = "master_jenis";
    protected $primaryKey = "ID_Jenis";
    protected $fillable = ['ID_Jenis', 'ID_Kategori', 'Nama_Jenis', 'Kode_Jenis'];

    public $timestamps = true;
}
