<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notas extends Model
{
    use HasFactory;

    protected $table = 'notas';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre', 'parcial_1', 'parcial_2', 'parcial_3'];
    public $timestamps = false;
}
