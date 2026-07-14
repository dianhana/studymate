<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudyGroup extends Model
{
    protected $table='groups';

    protected $fillable=[
        'owner_id',
        'name',
        'description',
        'cover'
    ];

    public function owner()
    {
        return $this->belongsTo(User::class,'owner_id');
    }
}