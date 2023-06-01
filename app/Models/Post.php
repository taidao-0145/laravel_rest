<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'name',
        'body',
        'description'
    ];

    public function tag(){
        return $this->hasMany(Tag::class, 'post_id');
    }
}
