<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $table = 'teams';
    protected $fillable = ['id', 'nome', 'sigla', 'id_adm', 'logo_path'];
    public $timestamps = false;
}
