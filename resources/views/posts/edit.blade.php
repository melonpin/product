@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="/css/edit.css">
        <title>服の寿命を計算するアプリ</title>
    </head>
    <body>
        {{Auth::user()->name}}さん、こんにちは！このページでは登録した服の情報を修正することが出来ます。
        <h1>編集画面</h1>
        <form action="/posts/{{ $post->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class = "w-50 container">
                <h4>服の状態</h4>
                <p class = "condition">
                    <select name="post[condition_id]" class="form-control">
                        @foreach($conditions as $condition)
                            <option value="{{ $condition->id }}" >{{ $condition->condition }}</option>
                        @endforeach
                    </select>
                </p>
                <h4>服の種類</h4>
                <p class = "type">
                    <select name="post[type_id]" class="form-control">
                        @foreach($types as $type)
                            <option value="{{ $type->id }}">{{ $type->type }}</option>
                        @endforeach
                    </select>
                    </p>
            <h4>服の素材</h4>
                <p class = "material">
                    <select name="post[material_id]" class="form-control">
                        @foreach($materials as $material)
                            <option value="{{ $material->id }}">{{ $material->material }}</option>
                        @endforeach
                    </select>
                </p>
                <h4>洗濯頻度の予定</h4>
                <p class = "frequency">
                    <select name="post[frequency_id]" class="form-control">
                        @foreach($frequencies as $frequency)
                            <option value="{{ $frequency->id }}">{{ $frequency->frequency }}</option>
                        @endforeach
                    </select>
                </p>
                <p class="body">
                    <h4>コメント</h4>
                    <input type='text' name="post[body]" value="{{ $post->body }}" class = "form-control"  placeholder="コメント記入欄（任意）">{{ old('post.body') }}</input>
                </p>
            </div>
            <p class = "submit"><input type="submit" class="btn btn-primary mb-3" value="保存"></p>
        </form>
    </body>
</html>
@endsection