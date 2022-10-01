@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>服の寿命を計算するアプリ</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/show.css">
    </head>
    <body>
    {{Auth::user()->name}}さん、こんにちは！このページでは先ほど登録した服の寿命を確認することが出来ます。
    <div class="content">
        <h1>登録結果</h1>
        <div class="container">
        <div class="table-responsive">
            <table class="table table-bordered table-caption-top">
                <caption>{{ $post->created_at }}に登録</caption>
                <thead class="thead-light">
                    <tr>
                        <th>寿命</th>
                        <th>服の状態</th>
                        <th>服の種類</th>
                        <th>服の素材</th>
                        <th>洗濯頻度</th>
                        <th>コメント</th>
                    </tr>
                </thead>
            <tbody>
                <tr>
                    <td><?php 
                    if(($post->type->data - $post->condition->data) * ($post->frequency->data) < 0){
                        echo '今が交換の時期です。';
                    }else{
                        echo  '約';
                        echo ($post->type->data - $post->condition->data) * ($post->frequency->data);
                        echo '年';
                    };
                    ?>
                    </td>
                    <td href="/conditions/{{ $post->condition->id }}">{{ $post->condition->condition }}</td>
                    <td href="/types/{{ $post->type->id }}">{{ $post->type->type }}</p></td>
                    <td href="/materials/{{ $post->material->id }}">{{ $post->material->material }}</td>
                    <td href="/frequencies/{{ $post->frequency->data }}">{{ $post->frequency->frequency }}</td>
                    <td><?php
                    if (is_null($post->body)){
                        echo 'コメントなし';
                    }else{
                        echo $post->body;
                    }
                    ?>
                    </td>
                </tr>
            </tbody>
        </table>
        
       
            <button type = "button" class="btn btn-outline-info">
                <a href="/">登録画面に戻る</a>
            </button>
            <button type = "button" class = "btn btn-outline-info"><a href="/posts/index">登録一覧へ</a></button>
        <button type = "button" class="btn btn-outline-info" ><a href="/posts/{{ $post->id }}/edit">修正する</a></button>
        
        <form action="/posts/{{ $post->id }}" id="form_delete" method="post" >
            @csrf
            @method('DELETE')
            <button type="button" class="btn btn-primary mb-3" onclick="deletePost({{ $post->id }})">削除する</button>
    　  </form>
        <script>
            function deletePost(e) {
                'use strict';
            if (confirm('削除すると復元できません。\n本当に削除しいますか？')) {
           　    document.getElementById('form_delete').submit();
            }
            }
        </script>
    </body>
</html>
@endsection