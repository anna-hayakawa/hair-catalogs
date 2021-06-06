<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\HairStyle;
use App\Tag;
use App\HairTag;

class CatalogController extends Controller
{
    public function add()
    {
        return view('admin.catalog.create', ['tags' => Tag::all()]);
    }


    public function create(Request $request)
    {
        $this->validate($request, HairStyle::$rules);
        $style = new HairStyle();
        $form = $request->all();

        if (isset($form['image1'])) {
            $path = $request->file('image1')->store('public/image');
            $style->image_path1 = basename($path);
        }
        if (isset($form['image2'])) {
            $path = $request->file('image2')->store('public/image');
            $style->image_path2 = basename($path);
        } else {
            $style->image_path2 = null;
        }
        if (isset($form['image3'])) {
            $path = $request->file('image3')->store('public/image');
            $style->image_path3 = basename($path);
        } else {
            $style->image_path3 = null;
        }
        $form_tags = $form['tag_id'];

        unset($form['_token']);
        unset($form['image1']);
        unset($form['image2']);
        unset($form['image3']);
        unset($form['tag_id']);

        $style->fill($form)->save();

        //中間テーブルへの保存
        $style_id = $style->id;

        if (is_array($form_tags)) {
            foreach ($form_tags as $form_tag) {
                $insert = [
                    'style_id' => $style_id,
                    'tag_id' => (int)$form_tag
                ];
                // dd($insert);
                HairTag::insert($insert);
            }
        }
        return redirect('admin/catalog');
    }


    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            $posts = HairStyle::where('title', 'LIKE', '%' . $cond_title . '%')
            ->orWhere('description', 'LIKE', '%' . $cond_title . '%')->get();
        } else {
            $posts = HairStyle::all();
        }
        return view('admin.catalog.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }


    public function edit(Request $request)
    {
        $style = HairStyle::find($request->id);
        if(empty($style)) {
            abort(404);
        }

        // 検索タグを取得
        $hair_tags = HairTag::where('style_id', $style->id)->get();

        // 配列に変換する変数の初期化
        $hair_tags_arr = [];

        // 検索タグを配列に変換
        foreach ($hair_tags as $hair_tag) {
            $hair_tags_arr[] = $hair_tag->tag_id;
        }

        $tags = Tag::all();
//        foreach ($tags as &$tag) {
//            if (in_array($tag->id, $hair_tags, true)) {
//                $tag->checked = true;
//            } else {
//                $tag->checked = false;
//            }
//        }
//        \Log::debug(__LINE__ . ' ' . print_r($hair_tags, true));
//        \Log::debug(__LINE__ . ' ' . print_r($hair_tags_arr, true));
//        \Log::debug(__LINE__ . ' ' . print_r($tags, true));

        return view('admin.catalog.edit', ['style_form' => $style, 'tags' => $tags, 'hair_tags' => $hair_tags_arr]);
    }


    public function update(Request $request)
    {
        $this->validate($request, HairStyle::$rules);

        $style = HairStyle::find($request->id);
        $style_form = $request->all();

        if ($request->file('image1')) {
            $path = $request->file('image1')->store('public/image');
            $style_form['image_path1'] = basename($path);
        } else {
            $style_form['image_path1'] = $style->image_path1;
        }
        if ($request->file('image2')) {
            $path = $request->file('image2')->store('public/image');
            $style_form['image_path2'] = basename($path);
        } else {
            $style_form['image_path2'] = $style->image_path2;
        }
        if ($request->file('image3')) {
            $path = $request->file('image3')->store('public/image');
            $style_form['image_path3'] = basename($path);
        } else {
            $style_form['image_path3'] = $style->image_path1;
        }

        unset($news_form['image1']);
        unset($news_form['image2']);
        unset($news_form['image3']);
        unset($news_form['_token']);

        $style->fill($style_form)->save();

        return redirect('admin/catalog');
    }


    public function delete(Request $request)
    {
        $style = HairStyle::find($request->id);


        $style->delete();

        return redirect('admin/catalog');
    }
}
