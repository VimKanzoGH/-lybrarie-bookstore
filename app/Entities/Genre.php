<?php

namespace App\Entities;

use App\Entities\Book;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Genre extends Model
{
     protected $fillable = [
        'name',
    ];

    public function books()
    {
       return $this->hasMany(Book::class);
    }
}
