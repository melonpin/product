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
        <link rel="stylesheet" href="/css/sho.css">
    </head>
    <body>
        <div class="content">
            <div class="content__post">
                <h3>本文</h3>
                    <?php
                    
 
                    if (is_null($post->body)){
                        echo 'コメントなし';
                    }else{
                        echo $post->body;
                    }
                    ?>
            </div>
        </div>
        
        <h3>寿命</h3>
        <div class = lifespan>
            <?php 
                if((($post->type->data) - ($post->condition->data)) * ($post->frequency->data) < 0){
                    echo '今が交換の時期です。';
                }else{
                    echo  ((($post->type->data) - ($post->condition->data)) * ($post->frequency->data));
                };
            ?>
        </div>
        <h3>詳細</h3>
            <div class = show>
                <p href="/conditions/{{ $post->condition->id }}">{{ $post->condition->condition }}</p>
                <p href="/types/{{ $post->type->id }}">{{ $post->type->type }}</p>
                <p href="/materials/{{ $post->material->id }}">{{ $post->material->material }}</p>
                <p href="/frequencies/{{ $post->frequency->id }}">{{ $post->frequency->frequency }}</p>
            </div>
        
            <div class="footer">
                <a href="/">戻る</a>
            </div>
        <p class="edit">[<a href="/posts/{{ $post->id }}/edit">修正する</a>]</p>
        <a href="/posts/{{ $post->id }}/edit" class="btn btn--orange">PUSH</a>
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