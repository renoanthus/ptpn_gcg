<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aspek extends Model
{
    protected $table = "aspek";

    protected $guarded = [
        '_token'
    ];

    public function child_1()
    {
        return $this->hasMany(Blok::class, 'afdeling_id');
    }
}
