<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
     use HasFactory;

    protected $table = 'tournaments';

    protected $fillable = [
        'name', 'game', 'start_date', 'end_date', 'type'
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function gameMatches()
    {
        return $this->hasMany(GameMatch::class);
    }
}

