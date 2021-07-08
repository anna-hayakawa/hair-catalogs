<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HairStyle extends Model
{
    protected $guarded = ['id'];

    public static $rules = [
        // 'user_id' => 'required',
        'image_path1' => 'required',
        // 'image_path2' => 'required',
        // 'image_path3' => 'required',
        'tag_id' => 'required',
        'title' => 'required|max:100',
        'caption' => 'max:50',
        'description' => 'required|max:350',
        ];

    //Tag ModelとHairTag Modelへの関連付け
    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'App\HairTag');
    }
}
