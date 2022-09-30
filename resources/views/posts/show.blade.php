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
        
        <h4>寿命</h4>
        <div class = lifespan>
            <?php 
                if((($post->type->data) - ($post->condition->data)) * ($post->frequency->data) < 0){
                    echo '今が交換の時期です。';
                }else{
                    echo  ((($post->type->data) - ($post->condition->data)) * ($post->frequency->data));
                };
            ?>
        </div>
        <h4>詳細</h4>
            <div class = show>
                <p href="/conditions/{{ $post->condition->id }}">{{ $post->condition->condition }}</p>
                <p href="/types/{{ $post->type->id }}">{{ $post->type->type }}</p>
                <p href="/materials/{{ $post->material->id }}">{{ $post->material->material }}</p>
                <p href="/frequencies/{{ $post->frequency->id }}">{{ $post->frequency->frequency }}</p>
            </div>
        
        <div class="body">
                <h4>コメント</h4>
                    <?php
                    
 
                    if (is_null($post->body)){
                        echo 'コメントなし';
                    }else{
                        echo $post->body;
                    }
                    ?>
            
        </div>
        
            <p class="footer">
                <a href="/">登録画面に戻る</a>
            </p>
            <p class = index><a href="/posts/index">登録一覧へ</a></p>
        <p class="edit">[<a href="/posts/{{ $post->id }}/edit">修正する</a>]</p>
        
        <form action="/posts/{{ $post->id }}" id="form_delete" method="post" >
            @csrf
            @method('DELETE')
            <p class="delete">[<a onclick="return deletePost(this);">削除する</a>]</p>
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