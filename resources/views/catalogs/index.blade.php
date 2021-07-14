@extends('layouts.front')

@section('title', 'HairCatalogs')

@section('content')
<script src="{{ mix('js/front.js') }}"></script>
    <div class="container">
        {{--  タグ検索  --}}
        <div class="row tag-groups">
            <form action="{{ route('catalogs.search') }}" method="get">
                <div class="tag-group">
                    <div class="col-md-2 tag-label">
                        <p>タグで検索する</p>
                    </div>
                    <div class="tag-area">
                        <p>
                            @foreach($tags as $tag)
                            <label class="checkbox">
                                <input type="checkbox" class="check_box" name="tag_ids[]" value="{{ $tag->id }}" />
                                <span>{{ $tag->tag_name }}</span>
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
                        <a href="{{ route('catalogs.detail', ['catalog_id' => $style->id]) }}">
                            <div class="style">
                                <div class="image col-md-12">
                                    <img src="{{ $style->image_path1 }}"  width="255" height="300">
                                </div>
                                <div class="text col-md-12">
                                    <div class="title-label">
                                        {{ str_limit($style->title, 65) }}
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            {{-- もっと見るボタン --}}
            <div class="style-list col-md-12 mx-auto row" id="more-list">
                {{-- front.jsに表示内容を記載 --}}
            </div>
            <div class="more-btn-box col-md-12 text-center">
                <button class="more-btn" data-page="1">もっと見る<span>1</span></button>
            </div>
        </div>
    </div>
@endsection
