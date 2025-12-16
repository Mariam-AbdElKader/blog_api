<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'img',
        'is_active',
    ];

    protected $hidden = [
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
