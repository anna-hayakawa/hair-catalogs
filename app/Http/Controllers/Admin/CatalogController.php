<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\HairStyle;
use App\Tag;
use App\HairTag;
use InterventionImage;

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
            $file1 = $request->file('image1');
            $filename1 = $file1->getClientOriginalName();
            InterventionImage::make($file1)->resize(255, null, function ($constraint) {$constraint->aspectRatio();})->save(storage_path('app/public/image/' . $filename1 ));
            $style->image_path1 = $filename1;
        }
        if (isset($form['image2'])) {
            $file2 = $request->file('image2');
            $filename2 = $file2->getClientOriginalName();
            InterventionImage::make($file2)->resize(255, null, function ($constraint) {$constraint->aspectRatio();})->save(storage_path('app/public/image/' . $filename2 ));
            $style->image_path2 = $filename2;
        } else {
            $style->image_path2 = null;
        }
        if (isset($form['image3'])) {
            $file3 = $request->file('image3');
            $filename3 = $file3->getClientOriginalName();
            InterventionImage::make($file3)->resize(255, null, function ($constraint) {$constraint->aspectRatio();})->save(storage_path('app/public/image/' . $filename3 ));
            $style->image_path3 = $filename3;
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


}
