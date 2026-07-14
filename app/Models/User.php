<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Kolom yang boleh diisi (Mass Assignment)
     */
    protected $fillable = [
        'user_code',
        'name',
        'email',
        'password',
    ];

    /**
     * Kolom yang disembunyikan
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Casts
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    // Permintaan pertemanan yang dikirim
    public function sentRequests()
    {
        return $this->hasMany(FriendRequest::class, 'sender_id');
    }

    // Permintaan pertemanan yang diterima
    public function receivedRequests()
    {
        return $this->hasMany(FriendRequest::class, 'receiver_id');
    }

    // Group yang dimiliki
    public function groups()
    {
        return $this->hasMany(StudyGroup::class, 'owner_id');
    }

    // Daftar teman
    public function friends()
    {
        return $this->hasMany(Friend::class, 'user_id');
    }

    public function myFriends()
    {
        return $this->hasMany(Friend::class, 'user_id');
    }
    public function sentMessages()
    {
        return $this->hasMany(Message::class,'sender_id');
    }

    public function receivedMessages()
    {
        return $this->hasMany(Message::class,'receiver_id');
    }
}