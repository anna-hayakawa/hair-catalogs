<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HairStyle;
use App\HairTag;
use App\Tag;
use App\User;
use App\Common\CatalogCommon;


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
        $page = (int)$request->input('page');

        //中間テーブルの検索の準備
        $hair_ids = $request->input('tag_ids');

        // $per_page = 12;
        // $skip = $page * $per_page;

        $search_params = [
            'tag_ids' => $request->input('tag_ids'),
            'page' => $page,
        ];
        // dd($search_params);
        $catalog = new CatalogCommon();
        $results = $catalog->searchCatalogs($search_params);

        //中間テーブルの検索
        //選択されたタグ一覧の取得
        // $hair_styles = HairTag::select('style_id')
        // ->when(is_array($hair_ids) && count($hair_ids) > 0, function ($query) use ($hair_ids) {
        //     \Log::debug(__LINE__.' '.print_r($hair_ids, true));
        //     return $query->whereIn('tag_id', $hair_ids);
        // })
        // ->distinct()->get();
        // dd($hair_tag);
        // $hair_style_ids = [];
        // foreach ($hair_styles as $hair_style) {
        //     $hair_style_ids[] = $hair_style->style_id;
        // }

        //styleの検索（main）
        // $styles = HairStyle::when(count($hair_style_ids) > 0, function ($query) use ($hair_style_ids) {
        //     \Log::debug(__LINE__.' '.print_r($hair_style_ids, true));
        //     return $query->whereIn('id', $hair_style_ids);
        // })
        // ->skip($skip)->take($per_page)->get();

        return view('catalogs.search', ['tags' => Tag::all(), 'posts' => $results, 'tag_ids' => $hair_ids]);;
    }
}


