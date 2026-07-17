<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $fillable = [
        'group_id',
        'user_id',
        'title',
        'description',
        'file',
        'file_size',
        'file_type',
        'is_premium',
        'downloads'
    ];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}