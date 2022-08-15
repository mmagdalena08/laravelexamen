<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class animales extends Model
{
    use HasFactory;
    protected $table= 'animales';
    public $timestamps =false;
    public $fillable = ['nombre', 'imagen', 'eliminado', 'id_tipoanimal'];
    //$table->timestamps();];
}
   


