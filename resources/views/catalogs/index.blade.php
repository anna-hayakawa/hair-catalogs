@extends('layouts.front')

@section('title', 'HairCatalogs')

@section('content')
<script src="{{ mix('js/front.js') }}"></script>
    <div class="container">
        {{--  タグ検索  --}}
        <div class="row tag-groups">
            <form action="{{ route('catalog.search') }}" method="get">
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
        {{--  カタログ一覧  --}}
        <div class="row">
            <div class="style-list col-md-12 mx-auto row">
                @foreach ($posts as $style)
                    <div>
                        <a href="{{ route('catalog.detail', ['catalog_id' => $style->id]) }}">
                            <div class="style">
                                <div class="image col-md-12">
                                    <img src="{{ asset('storage/image/' . $style->image_path1) }}"  width="255" height="300">
                                </div>
                                <div class="text col-md-12">
                                    <div class="title-label">
                                        {{ str_limit($style->title, 150) }}
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
                <div class="col-md-12" id="more-box">
                    <button class="more-btn" data-page="0">もっと見る</button>
                    <button class="more-btn" data-page="1">もっと見る2</button>
                </div>
            </div>
        </div>
    </div>
@endsection
