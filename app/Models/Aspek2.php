<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aspek2 extends Model
{
    protected $table = "aspek_2";

    protected $guarded = [
        '_token'
    ];

    public function parent_1()
    {
        return $this->belongsTo(Aspek1::class, 'aspek_1_id');
    }
    public function child_2()
    {
        return $this->hasMany(Aspek3::class, 'aspek_2_id');
    }
}
