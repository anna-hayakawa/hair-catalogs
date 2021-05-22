<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded = ['id'];

    public static $rules = [
        'tag_name' => 'required'
    ];

    public function styles()
    {
        return $this->belongsToMany('App\HairStyle', 'hair_tag');
    }
}
