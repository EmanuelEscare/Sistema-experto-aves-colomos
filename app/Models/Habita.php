<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habita extends Model
{
    use HasFactory;

    protected $fillable = ['id','nombre'];

    public function aves()
    {
        return $this->hasMany(Habitatave::class);
    }
}
