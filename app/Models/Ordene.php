<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordene extends Model
{
    use HasFactory;

    protected $fillable = ['id','nombre'];

    public function familias()
    {
        return $this->hasMany(Familia::class);
    }
}
