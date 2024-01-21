<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $table = "master_account";
    protected $primaryKey = "ID_Akun";
    protected $fillable = ['ID_Akun', 'Username', 'Email','Password', 'Nama', 'NIB', 'Alamat', 'No_Telp', 'Peran', 'Foto_Profile', 'Tanggal_Lahir', 'Status', 'Tanggal'];
}