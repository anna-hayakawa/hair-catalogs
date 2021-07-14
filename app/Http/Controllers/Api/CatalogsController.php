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
        $page = (int)$request->input('page');
        $per_page = 12;
        $skip = $page * $per_page;

        $results = HairStyle::orderBy('updated_at', 'DESC')->skip($skip)->take($per_page)->get();
        foreach($results as &$result) {
            $result['title_short'] = \str_limit($result['title'], 65);
        }

        return $results;
    }
}
