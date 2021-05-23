<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HairStyle;
use App\Tag;


class CatalogsController extends Controller
{
    public function index()
    {
    return view('catalogs.index', ['tags' => Tag::all()]);
    }
}
