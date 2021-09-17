<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bola_cartela extends Model
{
    use HasFactory;
    protected $fillable = ['bola','status','linha','cartela_id','user_id'];
}
