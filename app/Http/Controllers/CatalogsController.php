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
        // $value = $_REQUEST['val'];
        $posts = HairStyle::all()->sortByDesc('update_at');

        return view('catalogs.index', ['tags' => Tag::all(), 'posts' => $posts]);
    }

    public function detail(Request $request)
    {
        return view('catalogs.detail');
    }
}


