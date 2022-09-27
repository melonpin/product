<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>服の寿命を計算するアプリ</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>服の寿命を計算するアプリ</h1>

        <a class='create'>[<a href='/posts/create'>新しい衣服を登録する</a>]</a>
        <div class='posts'>
            @foreach ($posts as $post)
            <h2>登録内容</h2>
             <h3>寿命</h3>
            
             約<?php 
        
           if((($post->category->type_data) - ($post->category->condition_data)) * ($post->category->frequency_data) < 0){
           
            echo 1 ;
            
            }else{
            
             echo (($post->category->type_data) - ($post->category->condition_data)) * ($post->category->frequency_data);
            
            };
            
           
           ?>
           年
            
            <h3>詳細</h3>
            <p href="/categories/{{ $post->category->condition_data }}">{{ $post->category->condition }}</p>
            <p href="/categories/{{ $post->category->type_data }}">{{ $post->category->type }}</p>
            <p href="/categories/{{ $post->category->material_data }}">{{ $post->category->material }}</p>
            <p href="/categories/{{ $post->category->frequency_data }}">{{ $post->category->frequency }}</p>
            
            <h2>コメント</h2>
                <div class='post'>
                    <a href='/posts/{{ $post -> id }}'><h2 class='title'>{{ $post->title }}</h2></a>
                    <p class='body'>{{ $post->body }}</p>
                </div>
                
            @endforeach
          <div>
        
    </div>
        </div>
    </body>
</html>