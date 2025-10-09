<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $table = 'times';
    protected $fillable = ['id', 'nome', 'sigla', 'adm_id', 'logo_path'];
    public $timestamps = false;
}
