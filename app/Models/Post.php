<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'user_id', 'updated_at', 'created_at'];

    protected $touches = ['user'];

    // Inverse : posts belongs to user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Post has many comments
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // Post belogns to many tags (pivot table)
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    // One post has one image (polymorphic)
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
