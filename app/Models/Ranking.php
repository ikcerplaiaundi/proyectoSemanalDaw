<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ranking extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'puntuacion'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
         
        $this->attributes['name'] = ''; // Valor predeterminado para 'name'
        $this->attributes['puntuacion'] = 0; // Valor predeterminado para 'puntuacion'
    }

    
}
