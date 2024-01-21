<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // use HasFactory;
    protected $table = "master_product";
    protected $primaryKey = "ID_Product";
    protected $fillable = ['ID_Product', 'ID_Akun', 'ID_Jenis', 'Harpok_Barang', 'Harjul_Barang', 'Stok_Barang', 'Status'];

    public $timestamps = true;
}
