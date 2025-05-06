<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = "members";

    public function borrows()
    {
        return $this->hasMany(Borrow::class, "member_id");
    }
}
