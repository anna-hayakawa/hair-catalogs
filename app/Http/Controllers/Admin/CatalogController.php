<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\HairStyle;
use App\Tag;

class CatalogController extends Controller
{
    public function add()
    {
        return view('admin.catalog.create');
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
