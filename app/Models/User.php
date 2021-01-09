<?php

namespace App\Models;

use App\Client;
use App\Notifications\ResetPasswordNotification;
use App\Permission;
use App\Role;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;

/**
 * @property int               id
 * @property string            first_name
 * @property string            last_name
 * @property string            email
 * @property string            password
 * @property Carbon            password_changed_at
 */
class User extends Authenticatable implements CanResetPassword, MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
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
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function messages(){
        return $this->hasMany(Message::class);
    }

    public function lastLogins(){
        return $this->hasMany(LastLogin::class);
    }

    public function setPasswordAttribute($password) {
        $this->attributes['password'] = bcrypt(sha1($password));
    }

    public function sendPasswordResetNotification($token)
    {
        $url = config('app.url').'/reset-password/'.$token;

        $this->notify(new ResetPasswordNotification($url));
    }

}
