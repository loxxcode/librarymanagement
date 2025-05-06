<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    protected $table = 'borrows';

    public function books()
    {
        return $this->belongsTo(Book::class, 'book_id', 'isbn');
    }

    public function members()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }
}
