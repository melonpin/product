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
        <div class="content">
            <form action="/posts/{{ $post->id }}" method="POST">
                @csrf
                @method('PUT')
                <h2>服の状態</h2>
                <p class = condition>
                    <select name="post[condition_id]">
                        @foreach($conditions as $condition)
                            <option value="{{ $condition->id }}">{{ $condition->condition }}</option>
                        @endforeach
                    </select>
                </p>
                
                <h2>服の種類</h2>
                <p class = type>
                    <select name="post[type_id]">
                        @foreach($types as $type)
                            <option value="{{ $type->id }}">{{ $type->type }}</option>
                        @endforeach
                    </select>
                </p>
            
                <h2>服の素材</h2>
                <p class = material>
                    <select name="post[material_id]">
                        @foreach($materials as $material)
                            <option value="{{ $material->id }}">{{ $material->material }}</option>
                        @endforeach
                    </select>
                </p>
            
                <h2>洗濯頻度の予定</h2>
                <p class = frequency>
                    <select name="post[frequency_id]">
                        @foreach($frequencies as $frequency)
                            <option value="{{ $frequency->id }}">{{ $frequency->frequency }}</option>
                        @endforeach
                    </select>
                </p>
                <div class='body'>
                    <h2>本文</h2>
                    <input type='text' name='post[body]' value="{{ $post->body }}">
                </div>
                <p class = "submit"><input type="submit" value="保存"></p>
            </form>
        </div>
    </body>
</html>
@endsection