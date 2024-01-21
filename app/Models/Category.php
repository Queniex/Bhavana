<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // use HasFactory;
    protected $table = "master_category";
    protected $primaryKey = "ID_Kategori";
    protected $fillable = ['ID_Kategori', 'Nama_Kategori', 'Foto_Kategori', 'Keterangan'];

    public $timestamps = true;
}
