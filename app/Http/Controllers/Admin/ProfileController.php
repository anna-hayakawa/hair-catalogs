<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\User;
use App\HairStyle;
use Storage;

class ProfileController extends Controller
{
    public function index($user_id)
    {
        $profile = Auth::user();

        if ($user_id != $profile->id)
        {
            $profile = User::find($user_id);
        }

        $posts = HairStyle::all()->sortByDesc('updated_at');

        return view('admin.profile.index', ['profile_form' => $profile, 'posts' => $posts]);
    }


    public function edit()
    {
        $profile = Auth::user();

        return view('admin.profile.edit', ['profile_form' => $profile]);
    }


    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
            'introduction' => 'max:300',
        ]);

        $profile = User::find($request->id);
        $profile_form = $request->all();

        if ($request->image == '' &&$request->remove == "1") {
            $profile_form['image'] = null;
            $profile_form['image_path'] = null;
        } elseif ($request->file('image')) {
            $path = Storage::disk('s3')->putFile('/',$profile_form['image'],'public');
            $profile_form['image_path'] = Storage::disk('s3')->url($path);
        } else {
            $profile_form['image_path'] = $profile->image_path;
        }

        unset($profile_form['image']);
        unset($profile_form['remove']);
        unset($profile_form['_token']);

        $profile->fill($profile_form)->save();

        return redirect(route('profile', ['user_id' => Auth::user()->id]));
    }
}
