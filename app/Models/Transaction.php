<?php

namespace App\Models;

use App\Models\Book;
use App\Models\Store;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['books', 'store'];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function books()
    {
        return $this->belongstoMany(Book::class, 'book_transaction')
                    ->withPivot(['qty']);
    }
}
