<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HairTag extends Model
{
    protected $guarded = ['id'];

    //Modelにテーブルを認識させる
    protected $table = 'hair_tag';

//    const CREATED_AT = 'creation_date';
//    const UPDATED_AT = 'last_update';

    public static $rules = [
        'style_id' => 'required',
        'tag_id' => 'required',
    ];

    protected $fillable = ['post_id', 'tag_id'];
}
