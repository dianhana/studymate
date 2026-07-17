<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        'owner_id',
        'name',
        'description',
        'cover'
    ];

    public function owner()
    {
        return $this->belongsTo(User::class,'owner_id');
    }

    public function members()
    {
        return $this->hasMany(GroupMember::class);
    }
    public function messages()
    {
        return $this->hasMany(GroupMessage::class);
    }
    public function materials()
    {
        return $this->hasMany(Material::class);
    }
 
}