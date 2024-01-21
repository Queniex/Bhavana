<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaction extends Model
{
    // use HasFactory;
    protected $table = "detail_request";
    protected $primaryKey = "ID_Req";
    protected $fillable = ['No_Req', 'ID_Product', 'QTY', 'Status_Sup'];

    public $timestamps = true;
}
