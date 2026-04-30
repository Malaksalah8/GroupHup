<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'name',
        'min_students',
        'max_students',
        'user_id'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function instructor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
