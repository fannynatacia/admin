<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'level',
        'name',
        'email',
        'password',
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

        public function adminlte_image()
    {
        return asset('images/incognito.jpg');
    }

    public function adminlte_desc()
    {
        return '';
    }

    public function adminlte_profile_url()
    {
        return 'profile';
    }

    public function isAdmin()
    {
        foreach ($this->roles()->get() as $role){
            if ($role->id == 2){
                return true;
            }
        }
        return false;
    }
}


