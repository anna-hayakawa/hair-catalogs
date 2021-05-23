@extends('layouts.front')

@section('title', 'HairCatalogs')

@section('content')
    <div class="container">
        <div class="row">
            <div class="form-group row">
                <label class="col-md-3" for="tpo">シチュエーション</label>
                <p>
                    @foreach($tags as $tag)
                    <label>
                        <input type="checkbox" name="tag_id" value="{{ $tag->id }}">{{ $tag->tag_name }}
                    </label>
                    @endforeach
                </p>
            </div>
        </div>
    </div>
@endsection
