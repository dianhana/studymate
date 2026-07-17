<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'user_code',
        'name',
        'email',
        'password',
        'membership',
        'membership_expired_at'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'membership_expired_at' => 'datetime',
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | FRIEND
    |--------------------------------------------------------------------------
    */

    public function sentRequests()
    {
        return $this->hasMany(FriendRequest::class, 'sender_id');
    }

    public function receivedRequests()
    {
        return $this->hasMany(FriendRequest::class, 'receiver_id');
    }

    public function friends()
    {
        return $this->hasMany(Friend::class, 'user_id');
    }

    public function myFriends()
    {
        return $this->hasMany(Friend::class, 'user_id');
    }

    /*
    |--------------------------------------------------------------------------
    | CHAT
    |--------------------------------------------------------------------------
    */

    public function sentMessages()
    {
        return $this->hasMany(Message::class, 'sender_id');
    }

    public function receivedMessages()
    {
        return $this->hasMany(Message::class, 'receiver_id');
    }

    public function groupMessages()
    {
        return $this->hasMany(GroupMessage::class);
    }

    /*
    |--------------------------------------------------------------------------
    | GROUP
    |--------------------------------------------------------------------------
    */

    // Group yang dibuat user
    public function groups()
    {
        return $this->hasMany(Group::class, 'owner_id');
    }

    // Group yang diikuti user
    public function myGroups()
    {
        return $this->hasMany(GroupMember::class, 'user_id');
    }

    /*
    |--------------------------------------------------------------------------
    | MATERIAL
    |--------------------------------------------------------------------------
    */

    public function materials()
    {
        return $this->hasMany(Material::class);
    }

    /*
    |--------------------------------------------------------------------------
    | MEMBERSHIP
    |--------------------------------------------------------------------------
    */

    public function isFree()
    {
        return $this->membership === 'free';
    }

    public function isTrial()
    {
        return $this->membership === 'trial'
            && $this->membership_expired_at
            && now()->lessThanOrEqualTo($this->membership_expired_at);
    }

    public function isPremium()
    {
        return $this->membership === 'premium'
            && $this->membership_expired_at
            && now()->lessThanOrEqualTo($this->membership_expired_at);
    }

    public function hasActiveMembership()
    {
        return ($this->isTrial() || $this->isPremium());
    }
}