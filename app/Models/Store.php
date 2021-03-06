<?php

namespace App\Models;

use App\Models\Book;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Store extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];

    public function users() {
        return $this->hasMany(User::class);
    }

    public function books() {
        return $this->hasMany(Book::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'store_name'
            ]
        ];
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($store) {
             $store->users()->delete();
        });
    }
}
