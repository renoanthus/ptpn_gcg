<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aspek3 extends Model
{
    protected $table = "aspek_3";

    protected $guarded = [
        '_token'
    ];

    public function parent_2()
    {
        return $this->belongsTo(Aspek2::class, 'aspek_2_id');
    }

    public function child_3()
    {
        return $this->hasMany(Aspek4::class, 'aspek_3_id');
    }
}
