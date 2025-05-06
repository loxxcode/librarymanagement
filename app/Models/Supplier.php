<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = "suppliers";

    public function books()
    {
        return $this->belongsTo(Book::class, 'book_id','isbn');
    }
}
