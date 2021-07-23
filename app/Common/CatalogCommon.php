<?php

namespace App\Common;

use App\HairStyle;
use App\HairTag;

class CatalogCommon
{
    public function searchCatalogs(array $search_params)
    {
        \Log::debug(__LINE__.' '.__METHOD__.' '.print_r($search_params,true));
        //中間テーブルの検索の準備
        $hair_ids = $search_params['tag_ids'];
        \Log::debug(__LINE__.' '.__METHOD__.' hair_ids:'.print_r($hair_ids,true));

        $page = (int)$search_params['page'];
        $per_page = 12;
        $skip = $page * $per_page;

        //中間テーブルの検索
        //選択されたタグ一覧の取得
        $hair_styles = HairTag::select('style_id')
        ->when(is_array($hair_ids) && count($hair_ids) > 0, function ($query) use ($hair_ids) {
            \Log::debug(__LINE__.' '.print_r($hair_ids, true));
            return $query->whereIn('tag_id', $hair_ids);
        })
        ->distinct()->get();
        // dd($hair_tag);
        $hair_style_ids = [];
        foreach ($hair_styles as $hair_style) {
            $hair_style_ids[] = $hair_style->style_id;
        }
        // dd($hair_style_ids);
        \Log::debug(__LINE__.' '.__METHOD__.' '.print_r($hair_style_ids, true));

        //styleの検索（main）
        $styles = HairStyle::when(count($hair_style_ids) > 0, function ($query) use ($hair_style_ids) {
            // \Log::debug(__LINE__.' '.print_r($hair_style_ids, true));
            return $query->whereIn('id', $hair_style_ids);
        })
        ->skip($skip)->take($per_page)->get();
        \Log::debug(__LINE__.' '.__METHOD__.' styles:'.print_r($styles,true));
        return $styles;
    }
}
