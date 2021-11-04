<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timelog extends Model
{
    use HasFactory;

    protected $fillable = [
        'time',
        'date'
    ];

    public function user() {
        return $this->hasOne('App\Models\User');
    }

}
