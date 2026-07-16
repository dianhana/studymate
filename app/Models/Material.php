<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $fillable = [
        'group_id',
        'user_id',
        'title',
        'file'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
    public function comments()
    {
        return $this->hasMany(MaterialComment::class);
    }
}