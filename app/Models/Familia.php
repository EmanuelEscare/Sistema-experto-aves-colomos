<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Familia extends Model
{
    use HasFactory;

    protected $fillable = ['id','nombre', 'orden_id'];

    public function orden()
    {
        return $this->belongsTo(Ordene::class);
    }

    public function aves()
    {
        return $this->hasMany(Ave::class);
    }
}
