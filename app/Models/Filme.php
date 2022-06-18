<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Filme extends Model
{
    use HasFactory;

    public function sessoes(){
        return $this->hasOne(Sessoe::class);
    }
}
