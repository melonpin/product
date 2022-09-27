<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>服の寿命を計算するアプリ</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
        <h1 class="title">
            {{ $post->title }}
        </h1>
        <p class="edit">[<a href="/posts/{{ $post->id }}/edit">修正する</a>]</p>
        <form action="/posts/{{ $post->id }}" id="form_delete" method="post" >
             @csrf
             @method('DELETE')
    　　<p class="delete">[<a onclick="return deletePost(this);">削除する</a>]</p>
    　  </form>
    　 
        <div class="content">
            <div class="content__post">
                <h3>本文</h3>
                <p>{{ $post->body }}</p>    
            </div>
        </div>
        
        <h3>寿命</h3>
        <div class = lifespan>
        
             <p>約<?php 
           
           if((($post->category->type_data) - ($post->category->condition_data)) * ($post->category->frequency_data) < 0){
           
            echo 1 ;
            
            }else{
            
             echo (($post->category->type_data) - ($post->category->condition_data)) * ($post->category->frequency_data);
            
            };
            
           
           ?>
           年</p>
        </div>
        <h3>詳細</h3>
        <div class = show>
        <p href="/categories/{{ $post->category->condition_data }}">{{ $post->category->condition }}</p>
        <p href="/categories/{{ $post->category->type_data }}">{{ $post->category->type }}</p>
        <p href="/categories/{{ $post->category->id }}">{{ $post->category->material }}</p>
        <p href="/categories/{{ $post->category->frequency_data }}">{{ $post->category->frequency }}</p>
        </div>
        
        <div class="footer">
            <a href="/">戻る</a>
        </div>
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
