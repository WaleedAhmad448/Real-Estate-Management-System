<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;
    protected $primaryKey = 'user_id';
    public $incrementing = false;
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'name',
        'email',
        'password',
        'role',
        'phone_number',
        'city_id',
        'picture_path'
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function properties()
    {
        return $this->hasMany(Property::class, 'agent_id', 'user_id');
    }

    public function interactions()
    {
        return $this->hasMany(UserInteraction::class, 'user_id_1', 'user_id');
    }

    public function clientTransactions()
    {
        return $this->hasMany(Transaction::class, 'client_id', 'user_id');
    }

    public function agentTransactions()
    {
        return $this->hasMany(Transaction::class, 'agent_id', 'user_id');
    }
}
