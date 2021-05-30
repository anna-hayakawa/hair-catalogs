@extends('layouts.front')

@section('title', '詳細ページ')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="from-group">
                    <div class="col-md-4">
                        <table class="table table-striped">
                            <tr>
                                <th>id</th>
                                <td>{{ $id }}</td>
                                </tr>
                                <tr>
                                <th>タスク</th>
                                <td>{{ $style->title }}</td>
                            </tr>
                            </table>
                        {{-- <img class="form-catalog-detail" id="image1" src="{{ asset('storage/image/' . $profile_form->image_path) }}"> --}}
                    </div>

            </div>
        </div>
    </div>
@endsection
