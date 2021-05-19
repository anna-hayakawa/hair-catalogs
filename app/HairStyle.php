<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HairStyle extends Model
{
    protected $guarded = ['id'];

    public static $rules = [
        'user_id' => 'required',
        'title' => 'required',
        'description' => 'required',
        'image_path' => 'required'
    ];
}
