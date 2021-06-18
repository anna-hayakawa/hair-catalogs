<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;

use App\HairStyle;

class CatalogsController extends Controller
{
    public function index(Request $request)
    {
        return HairStyle::orderByDesc('updated_at')->take(12)->get();
    }
}
