<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aspek4 extends Model
{
    protected $table = "aspek_4";

    protected $guarded = [
        '_token'
    ];

    public function parent_3()
    {
        return $this->belongsTo(Aspek3::class, 'aspek_3_id');
    }
}
