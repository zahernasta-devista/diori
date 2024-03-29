<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;



class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'position',
        'password',
        'organization_id',
        'first_time_login'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',

    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function projects()
    {
        return $this->belongsToMany(Project::class, 'users_projects');
    }

    public function timelogs()
    {
        return $this->hasMany(Timelog::class, 'user_id');
    }

    public function timelogsFromMonthAndYear($month, $year)
    {
        return $this->hasMany(Timelog::class, 'user_id')
            ->whereMonth('date', $month)
            ->whereYear('date', $year)
            ->get();
    }

    public function timelogsFromMonthAndYearForProject($month, $year, $projectSelected)
    {
        return $this->hasMany(Timelog::class, 'user_id')
            ->whereMonth('date', $month)
            ->whereYear('date', $year)
            ->where('project_id',$projectSelected)
            ->get();
    }
    public function timelogsFromMonthAndYearForEmployeeAndProject($month, $year, $selectedEmployee,$projectSelected)
    {
        return $this->hasMany(Timelog::class, 'user_id')
            ->where('user_id',$selectedEmployee)
            ->whereMonth('date', $month)
            ->whereYear('date', $year)
            ->where('project_id', $projectSelected)
            ->get();
    }
    public function timelogsFromWeek($startWeek, $endWeek)
    {
        return $this->hasMany(Timelog::class, 'user_id')
            ->whereBetween('date', [$startWeek, $endWeek])
            ->get();
    }
}
