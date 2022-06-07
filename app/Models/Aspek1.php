<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aspek1 extends Model
{
    protected $table = "aspek_1";

    protected $guarded = [
        '_token'
    ];

    public function child_1()
    {
        return $this->hasMany(Aspek2::class, 'aspek_1_id');
    }
}
