<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';

    public function suppliers()
    {
        return $this->hasMany(Supplier::class, "book_id", "isbn");
    }
    public function borrows()
    {
        return $this->hasMany(Borrow::class, "book_id", "isbn");
    }
}
