<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ave extends Model
{
    use HasFactory;

    protected $fillable = ['id','nombre', 'mide', 'familia_id'];

    public function familia()
    {
        return $this->belongsTo(Familia::class);
    }

    public function habitats()
    {
        return $this->hasMany(Habitat_ave::class);
    }

    public function atributos()
    {
        return $this->hasMany(Atributo::class);
    }
}
