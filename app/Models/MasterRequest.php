<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterRequest extends Model
{
    // use HasFactory;
    protected $table = "master_request";
    protected $primaryKey = "No_Req";
    protected $fillable = ['ID_Buyer', 'Awal_Kontrak', 'Akhir_Kontrak', 'Status_Req', 'Contract_Buy'];

    public $timestamps = true;
}
