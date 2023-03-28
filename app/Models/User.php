<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public $appends = ['name', 'href'];
    public function getProfilePicAttribute(){
        $profile_pic = $this->attributes['profile_pic'] ? url('/storage/users/'.$this->attributes['profile_pic']) :  url('/assets/img/avatars/profile_avatar.jpg');
        return $profile_pic;
    }
    public function getNameAttribute(){
        if(isset($this->attributes['first_name']))
        return $this->attributes['first_name'] . ' '.$this->attributes['last_name'];
    }
    public function getHrefAttribute(){
        if(isset($this->attributes['id']))
        return getHrefLinkOfUser($this->attributes['id']);
    }
}
