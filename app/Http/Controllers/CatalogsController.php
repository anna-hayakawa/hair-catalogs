<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HairStyle;
use App\HairTag;
use App\Tag;


class CatalogsController extends Controller
{
    public function index(Request $request)
    {
        // $tag_id = optional($request->tag)->id;
        // if (isset($tag_id)) {
        //     $tag_num = HairTag::where('tag_id', $tag_id)->get();
        //     $posts = HairStyle::where('id', $tag_num->style_id).orderBy('updated_at', 'desc')->get();
        // } else {
        //     $posts = HairStyle::all()->sortByDesc('updated_at');
        // }

        $posts = HairStyle::all()->sortByDesc('updated_at');

        return view('catalogs.index', ['tags' => Tag::all(), 'posts' => $posts]);
    }


    public function detail($catalog_id)
    {
        $style = HairStyle::find($catalog_id);
        // dd($style);
        return view('catalogs.detail', ['style' => $style]);
    }


    public function search(Request $request)
    {
        //
    }
}


