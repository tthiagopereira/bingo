<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cartela extends Model
{
    use HasFactory;

    protected $fillable = ['partida_id','user_id'];

    public function bolaCartelas()
    {
        return $this->hasMany(Bola_cartela::class);
    }
}
