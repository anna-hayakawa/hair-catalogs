<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HairTag extends Model
{
    protected $guarded = ['id'];

    public static $rules = [
        'style_id' => 'required',
        'tag_id' => 'required',
    ];

    protected $fillable = ['post_id', 'tag_id'];
}
