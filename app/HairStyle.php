<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HairStyle extends Model
{
    protected $guarded = ['id'];

    public static $rules = [
        'user_id' => 'required',
        'image1' => 'required',
        'tag_id' => 'required',
        'title' => 'required',
        'description' => 'required',
        ];

    //Tag ModelとHairTag Modelへの関連付け
    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'App\HairTag');
    }
}
