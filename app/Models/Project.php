<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'backend',
        'start_date',
        'customer_id'
    ];

    public function customer(){
        return $this->belongsTo('App\Models\Customer');
    }

    public function users() {
        return $this->belongsToMany(User::class, 'users_projects');
    }

    public function timelogs() {
        return $this->hasMany(Timelog::class, 'project_id');
    }

    public function timelogsFromMonthAndYear($month, $year, $userId) {
        return $this->hasMany(Timelog::class, 'project_id')
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->where('user_id', $userId)
            ->get();
    }
}
