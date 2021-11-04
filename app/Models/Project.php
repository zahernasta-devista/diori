<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'start_date'
    ];

    public function customer(){
        return $this->hasOne('App\Models\Customer');
    }

    public function users() {
        return $this->belongsToMany(User::class, 'users_projects');
    }
}
