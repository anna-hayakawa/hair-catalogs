<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HairStyle;
use App\HairTag;
use App\Tag;
use App\User;


class CatalogsController extends Controller
{
    public function index(Request $request)
    {
        $posts = HairStyle::orderBy('updated_at', 'DESC')->take(12)->get();

        return view('catalogs.index', ['tags' => Tag::all(), 'posts' => $posts]);
    }


    public function detail($catalog_id)
    {
        $style = HairStyle::find($catalog_id);

        //投稿時、選択したタグの名前を取得
        if (HairTag::where('style_id', $style->id)) {
            $hair_tags = HairTag::where('style_id', $style->id)->get();
        }
        $tags = [];
        foreach ($hair_tags as $hair_tag) {
                $tags[] = Tag::find($hair_tag->tag_id);
        }

        //投稿者の情報を取得
        $profile = User::find($style->user_id);
        // dd($profile);

        return view('catalogs.detail', ['style' => $style, 'tags' => $tags, 'profile_form' => $profile]);
    }


    public function search(Request $request)
    {
        // dd($request->tag_ids);

        //中間テーブルの検索の準備
        $hair_ids = $request->input('tag_ids');

        // dd($_REQUEST);

        //中間テーブルの検索
        $hair_styles = HairTag::whereIn('tag_id', $hair_ids)->select('style_id')->distinct()->get(); //選択されたタグ一覧の取得
        // dd($hair_tag);
        $hair_style_ids = [];
        foreach ($hair_styles as $hair_style) {
            $hair_style_ids[] = $hair_style->style_id;
        }
        // dd($hair_style_ids);

        //styleの検索（main）
        $styles = HairStyle::whereIn('id', $hair_style_ids)->get();
        // dd($styles);

        return view('catalogs.search', ['tags' => Tag::all(), 'posts' => $styles]);
    }
}


