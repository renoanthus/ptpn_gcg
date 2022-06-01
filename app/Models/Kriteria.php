<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    protected $table = "kriteria";

    protected $guarded = [
        '_token'
    ];

    public function aspek()
    {
        return $this->belongsTo(Aspek::class, 'parent_1','id');
    }
    public function child_2()
    {
        return $this->hasMany(Kriteria::class, 'parent_2','id');
    }
    public function child_3()
    {
        return $this->hasMany(Kriteria::class, 'parent_3','id');
    }
    public function child_4()
    {
        return $this->hasMany(Kriteria::class, 'parent_4','id');
    }

    public function parent_2()
    {
        return $this->belongsToMany(Kriteria::class, 'parent_2','id');
    }
}
