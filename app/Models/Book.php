<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = ['title','slug','description','cover','price','discount', 'user_id'];

    public $table = 'books';

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }

    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }

    public function user()
    {
        return $this->belongsToMany(User::class);
    }
    public function sluggable()
    {
        return[
            'slug'=>[
                'source'=>'title'
            ]
        ];
    }
}
