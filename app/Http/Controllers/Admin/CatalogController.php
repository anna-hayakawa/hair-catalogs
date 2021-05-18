<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CatalogController extends Controller
{
    public function add()
    {
        return view('admin.catalog.create');
    }

    public function create(Request $request)
    {
        return redirect('admin/catalog/create');
    }

    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            $posts = News::where('title', 'LIKE', '%' . $cond_title . '%')
            ->orWhere('body', 'LIKE', '%' . $cond_title . '%')->get();
        } else {
            $posts = News::all();
        }
        return view('admin.news.index', ['posts' => $posts, 'cond_title' => $cond_title]);
        return view('admin.catalog.index');
    }
}
