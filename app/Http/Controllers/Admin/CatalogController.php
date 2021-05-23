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

        unset($form['_token']);
        unset($form['image1']);
        unset($form['image2']);
        unset($form['image3']);

        $style->fill($form)->save();

        $style = HairStyle::create($request->all());
        $style->tags()->attach(request()->tag_id);

        // //中間テーブルへの保存
        // $tagId = HairStyle::all()->last();

        // $hair_tag = new HairTag();
        // $hair_tag->style_id = $tagId->id;
        // $hair_tag->tag_id = $tagId->tag_id;
        // $hair_tag->save();

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
}
