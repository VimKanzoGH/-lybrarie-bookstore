<?php

namespace App\Entities;

use App\User;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Nicolaslopezj\Searchable\SearchableTrait;

class Book extends Model implements HasMedia
{
    use InteractsWithMedia, SearchableTrait;

    protected $fillable = [
        'title', 'slug', 'isbn', 'blurb', 'price', 'published_date', 'author_id', 'genre_id', 'publish',
    ];

    public function getCoverAttribute()
    {
        return $this->getFirstMedia('book');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
              ->width(150)
              ->height(100)
              ->sharpen(10);
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

     /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'books.title' => 20,
            'books.blurb' => 20,
            'books.isbn' => 15,
            'books.published_date' => 5,
        ],
        'joins' => [
            // 'authors' => ['books.id','authors.author_id'],
            // 'genres' => ['books.id','genres.author_id'],
        ],
    ];
}
