<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Premiacao extends Model
{
    use HasFactory;
    protected $fillable = ['moeda','valor','percentual','linha','linha_percentual','linha_dupla','linha_dupla_percentual','bingo_percentual','user_id'];

    public function partidas()
    {
        return $this->hasMany(Partida::class);
    }
}
