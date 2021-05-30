@extends('layouts.front')

@section('title', 'HairCatalogs')

@section('content')
    <div class="container">
        <div class="row">
            <form action="{{ action('CatalogsController@index') }}" method="get">
                <div class="tag-group">
                    <div class="col-md-2 tag-label">
                        <p>タグで検索する</p>
                    </div>
                    <div class="tag-area">
                        <p>
                            @foreach($tags as $tag)
                            <label class="checkbox">
                                <input type="checkbox" class="check_box" name="tag_id[]" value="{{ $tag->id }}">{{ $tag->tag_name }}
                            </label>
                            @endforeach
                        </p>
                        <div class="col-md-12 text-right">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary tag-btn" value="検索">
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="row">
            <div class="style-list col-md-12 mx-auto row">
                @foreach ($posts as $style)
                    <a href="{{ action('CatalogsController@detail') }}">
                        <div class="style">
                            <div class="image col-md-6 text-right mt-4">
                                <img src="{{ asset('storage/image/' . $style->image_path1) }}"  width="255" height="300">
                            </div>
                            <div class="text col-md-6">
                                <div class="title-label">
                                    {{ str_limit($style->title, 150) }}
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
