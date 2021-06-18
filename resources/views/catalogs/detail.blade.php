@extends('layouts.front')

@section('title', '【' . $style->title . '】' . 'の詳細ページ')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="col-md-12 detail-box">
                    <div class="col-md-7 mx-auto image-box">
                        @if ($style->image_path1 != null)
                            <img src="{{ asset('storage/image/' . $style->image_path1) }}" alt="" onerror="this.src='/images/lady_icon.png'" />
                        @else
                            <img alt="">
                        @endif
                    </div>
                    <div class="col-md-8">
                        <div class="col-md-4 title-box">
                            <div class="title-text">
                                {{ $style->title }}
                            </div>
                        </div>
                        <div class="col-md-8 caption-box">
                            <div class="caption-text">
                                {{ $style->caption }}
                            </div>
                        </div>
                        <div class="col-md-8 desc-box">
                            <div class="desc-text">
                                {{ $style->introduction }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
