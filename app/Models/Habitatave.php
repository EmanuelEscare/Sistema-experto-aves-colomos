<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habitatave extends Model
{
    use HasFactory;
    
    protected $fillable = ['id', 'ave_id', 'habitat_id'];

    public function ave()
    {
        return $this->belongsTo(Ave::class);
    }

    public function habitat()
    {
        return $this->belongsTo(Habita::class);
    }
}
