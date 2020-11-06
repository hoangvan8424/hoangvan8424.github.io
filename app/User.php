<?php

namespace App;

use App\Model\Branch;
use App\Model\Department;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     * role = 1 - Thợ shop
     * role = 2 - Thợ makeup
     * role = 3 - Thợ chụp
     * role = 0 - Còn lại
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'branch_id',
        'department_id',
        'todo',
        'avatar',
        'role',
        'date_of_birth',
        'sex'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function branch() {
        return $this->belongsTo(Branch::class, 'branch_id');
    }

    public function department() {
        return $this->belongsTo(Department::class, 'department_id');
    }

}
