<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HairTagMatch extends Model
{
    protected $guarded = ['id'];

    public static $rules = [
        'style_id' => 'required',
        'tag_id' => 'required',
    ];
}
