@extends('layouts.front')

@section('title', '【' . $style->title . '】' . 'の詳細ページ')

@section('content')
<script src="{{ mix('js/front.js') }}"></script>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="col-md-12 detail-box">
                    <div class="col-md-7 mx-auto image-box">
                        {{--  インジケーターの表示方法の指定  --}}
                        <div id="carousel-1" class="carousel slide">
                            {{--  画像1,2,3が保存されている場合、３つ表示する  --}}
                            @if ($style->image_path2 != null && $style->image_path3 != null)
                                <ol class="carousel-indicators">
                                    <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel-1" data-slide-to="1"></li>
                                    <li data-target="#carousel-1" data-slide-to="2"></li>
                                </ol>
                            {{--  画像1,2または、画像1,3が保存されている場合、２つ表示する  --}}
                            @elseif ($style->image_path1 != null && $style->image_path2 != null)
                                <ol class="carousel-indicators">
                                    <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel-1" data-slide-to="1"></li>
                                </ol>
                            @elseif ($style->image_path1 != null && $style->image_path3 != null)
                                <ol class="carousel-indicators">
                                    <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel-1" data-slide-to="1"></li>
                                </ol>
                            @endif
                            {{--  スタイダーで表示する画像の指定  --}}
                            <div class="carousel-inner">
                                {{--  画像1のみ保存されている場合、画像1のみ表示する  --}}
                                @if ($style->image_path2 == null && $style->image_path3 == null)
                                    <div class="carousel-item active">
                                        @if ($style->image_path1 != null)
                                            <img class="d-block w-100" src="{{ $style->image_path1 }}" alt="First slide">
                                        @else
                                            <img alt="">
                                        @endif
                                    </div>
                                {{--  画像1,2のみ保存されている場合、画像1,2を表示する  --}}
                                @elseif ($style->image_path3 == null)
                                    <div class="carousel-item active">
                                        @if ($style->image_path1 != null)
                                            <img class="d-block w-100" src="{{ $style->image_path1 }}" alt="First slide">
                                        @else
                                            <img alt="">
                                        @endif
                                    </div>
                                    <div class="carousel-item">
                                        @if ($style->image_path2 != null)
                                            <img class="d-block w-100" src="{{ $style->image_path2 }}" alt="Second slide">
                                        @else
                                            <img alt="">
                                        @endif
                                    </div>
                                {{--  画像1,3のみ保存されている場合、画像1,3を表示する  --}}
                                @elseif ($style->image_path2 == null)
                                    <div class="carousel-item active">
                                        @if ($style->image_path1 != null)
                                            <img class="d-block w-100" src="{{ $style->image_path1 }}" alt="First slide">
                                        @else
                                            <img alt="">
                                        @endif
                                    </div>
                                    <div class="carousel-item">
                                        @if ($style->image_path3 != null)
                                            <img class="d-block w-100" src="{{ $style->image_path3 }}" alt="Third slide">
                                        @else
                                            <img alt="">
                                        @endif
                                    </div>
                                {{-- 画像1,2,3を表示する  --}}
                                @else
                                    <div class="carousel-item active">
                                        @if ($style->image_path1 != null)
                                            <img class="d-block w-100" src="{{ $style->image_path1 }}" alt="First slide">
                                        @else
                                            <img alt="">
                                        @endif
                                    </div>
                                    <div class="carousel-item">
                                        @if ($style->image_path2 != null)
                                            <img class="d-block w-100" src="{{ $style->image_path2 }}" alt="Second slide">
                                        @else
                                            <img alt="">
                                        @endif
                                    </div>
                                    <div class="carousel-item">
                                        @if ($style->image_path3 != null)
                                            <img class="d-block w-100" src="{{ $style->image_path3 }}" alt="Third slide">
                                        @else
                                            <img alt="">
                                        @endif
                                    </div>
                                @endif
                            </div>
                            {{--  コントローラー(左右の矢印)の表示方法の指定  --}}
                            {{--  画像1,2,3が保存されている場合、表示する  --}}
                            @if ($style->image_path2 != null && $style->image_path3 != null)
                                <a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carousel-1" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            {{--  画像1,2が保存されている場合、表示する  --}}
                            @elseif ($style->image_path1 != null && $style->image_path2 != null)
                                <a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carousel-1" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            {{--  画像1,3が保存されている場合、表示する  --}}
                            @elseif ($style->image_path1 != null && $style->image_path3 != null)
                                <a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carousel-1" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            @endif
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-12 title-box">
                                <div class="title-text">
                                    {{ '【' . $style->title . '】' }}
                                </div>
                            </div>
                            <div class="col-md-12 caption-box">
                                <div class="caption-text">
                                    {{ $style->caption }}
                                </div>
                            </div>
                            <div class="col-md-12 desc-box">
                                <div class="desc-text">
                                    {{ $style->description }}
                                </div>
                            </div>
                            <div class="col-md-12 tpo-box">
                                <div class="tpo-label">
                                    <p>シチュエーション</p>
                                </div>
                                <div class="tag-box">
                                    @foreach ($tags as $tag)
                                        <label class="tag-name">
                                            {{ $tag->tag_name }}
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-12 user-boxes">
                                <div class="user-label">
                                    <p>投稿者</p>
                                </div>
                                <div class="col-md-4 user-box row">
                                    @if ($profile_form->image_path != null)
                                        <img src="{{ asset('storage/image/' . $profile_form->image_path) }}" alt="" onerror="this.src='/images/default_profile_icon.png'" />
                                    @else
                                        <img alt="">
                                    @endif
                                    <div class="name-text">
                                        <a href="{{ route('profile', ['user_id' => $profile_form->id]) }}">
                                            {{ $profile_form->name }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 updated-box">
                                {{-- created_atとupdated_atが異なる場合(投稿が更新された場合)、「編集済み」と表示させる --}}
                                <div class="updated-text">
                                    @if ($style->updated_at != $style->created_at)
                                        {{ "投稿日：" . $style->created_at->format('Y年m月d日') . "(編集済み)" }}
                                    @else
                                        {{ "投稿日：" . $style->created_at->format('Y年m月d日') }}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
