<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\HairStyle;
use App\Tag;
use App\HairTag;
use Carbon\Carbon;

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

        if (isset($form['image_path1'])) {
            $path = $request->file('image_path1')->store('public/image');
            $style->image_path1 = basename($path);
        }
        if (isset($form['image_path2'])) {
            $path = $request->file('image_path2')->store('public/image');
            $style->image_path2 = basename($path);
        } else {
            $style->image_path2 = null;
        }
        if (isset($form['image_path3'])) {
            $path = $request->file('image_path3')->store('public/image');
            $style->image_path3 = basename($path);
        } else {
            $style->image_path3 = null;
        }
        $form_tags = $form['tag_id'];

        unset($form['_token']);
        unset($form['image_path1']);
        unset($form['image_path2']);
        unset($form['image_path3']);
        unset($form['remove1']);
        unset($form['remove2']);
        unset($form['remove3']);
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
                HairTag::insert($insert);
            }
        }
        return redirect('admin/catalog');
    }


    public function index(Request $request)
    {
        //投稿一覧での検索機能
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            $posts = HairStyle::where('title', 'LIKE', '%' . $cond_title . '%')
            ->orWhere('description', 'LIKE', '%' . $cond_title . '%')->orderBy('updated_at', 'desc')->get();
        } else {
            $posts = HairStyle::all()->sortByDesc('updated_at');
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
        $rules = HairStyle::$rules;

        $style = HairStyle::find($request->style_id);
        $style_form = $request->all();

        //バリデーション image_path1の必須を解除
        if ($style->image_path1 !== '') {
            unset($rules['image_path1']);
        }
        //バリデーション 編集時、image1の画像をクリアして保存できないように
        if ($request->image1 == '' && $request->remove1 == "1") {
            $rules['image_path1'] = 'required';
        }

        $this->validate($request, $rules);

        \Log::debug(__LINE__ . ' ' . __METHOD__ . ' ' . print_r($style_form, true));

        //リクエストの保存
        if (isset($style_form['image1'])) {
            $path = $request->file('image1')->store('public/image');
            $style_form['image_path1'] = basename($path);
        } else {
            $style_form['image_path1'] = $style->image_path1;
        }

        if ($request->remove2 == "1") {
            $style_form['image2'] = null;
            $style_form['image_path2'] = null;
        } elseif (isset($style_form['image2'])) {
            $path = $request->file('image2')->store('public/image');
            $style_form['image_path2'] = basename($path);
        } else {
            $style_form['image_path2'] = $style->image_path2;
        }

        // if (!isset($style_form['image3']) || $request->remove3 == "1") {
        if ($request->remove3 == "1") {
            $style_form['image3'] = null;
            $style_form['image_path3'] = null;
        } elseif (isset($style_form['image3'])) {
            $path = $request->file('image3')->store('public/image');
            $style_form['image_path3'] = basename($path);
        } else {
            $style_form['image_path3'] = $style->image_path3;
        }

        $form_tags = $style_form['tag_id'];

        unset($style_form['image1']);
        unset($style_form['image2']);
        unset($style_form['image3']);
        unset($style_form['remove1']);
        unset($style_form['remove2']);
        unset($style_form['remove3']);
        unset($style_form['_token']);
        unset($style_form['tag_id']);
        unset($style_form['style_id']);
        // dd($style_form);

        $style->fill($style_form)->save();

        //中間テーブルへの保存
        $style_id = $style->id;
        HairTag::where('style_id', $style_id)->delete();

        if (is_array($form_tags)) {
            foreach ($form_tags as $form_tag) {
                $insert = [
                    'style_id' => $style_id,
                    'tag_id' => (int)$form_tag,
                    // 'created_at' => Carbon::now(),
                    // 'update_at' => Carbon::now(),
                ];
                HairTag::insert($insert);
            }
        }

        return redirect('admin/catalog');
    }


    public function delete(Request $request)
    {
        $style = HairStyle::find($request->id);

        //中間テーブルの削除
        if (HairTag::where('style_id', $style->id)) {
            HairTag::where('style_id', $style->id)->delete();
        }

        //スタイルの削除
        $style->delete();

        return redirect('admin/catalog');
    }
}
