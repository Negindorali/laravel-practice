<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */


    const NAME='name';
    const OTP_CODE='otp_code';
    const PHONE='phone';
    const PROFILE='profile_img';
    const ID='id';
    protected $fillable = [
        self::NAME,
        self::OTP_CODE,
        self::PHONE,
        self::PROFILE,
        self::ID
    ];


    public function parent()
    {
        return $this->belongsTo(User::class,'parent_id');
    }

    public function userPosts()
    {
        return $this->belongsToMany(Posts::class,'posts');
    }
}
