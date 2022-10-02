@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="/css/index.css">
        <title>服の寿命を計算するアプリ</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        {{Auth::user()->name}}さん、こんにちは！このページでは登録した服を確認することが出来ます。
        <h1>登録結果一覧</h1>
        <h5>[<a class='create'><a href='/'>新しい衣服を登録する</a>]</a></h5>
        @foreach ($posts as $post)
            <div>
                <div class="table-responsive container">
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
                            <td>
                                <?php 
                                    if(($post->type->data - $post->condition->data) * ($post->frequency->data) < 0){
                                        echo '今が交換の時期です。';
                                    }else{
                                        echo '約'.($post->type->data - $post->condition->data) * ($post->frequency->data).'年';
                                    }
                                ?>
                            </td>
                            <td href="/conditions/{{ $post->condition->id }}">{{ $post->condition->condition }}</td>
                            <td href="/types/{{ $post->type->id }}">{{ $post->type->type }}</p></td>
                            <td href="/materials/{{ $post->material->id }}">{{ $post->material->material }}</td>
                            <td href="/frequencies/{{ $post->frequency->data }}">{{ $post->frequency->frequency }}</td>
                            <td>
                                <?php
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
            </div>
            <div class = "container">
                <div class="d-grid gap-2 d-md-flex justify-content-md">
                    <form action="/posts/{{ $post->id }}" id="form_delete" method="post" >
                        @csrf
                        @method('DELETE')
                        <a class="btn btn-primary" href="/posts/{{ $post->id }}/edit" role="button">修正する</a>
                        <button type="button" class="btn btn-primary" onclick="deletePost({{ $post->id }})">削除する</button>
    　               </form>
    　           </div>
            </div>
            <script>
                function deletePost(e) {
                    'use strict';
                if (confirm('削除すると復元できません。\n本当に削除しいますか？')) {
           　        document.getElementById('form_delete').submit();
                }
                }
            </script>
        @endforeach
    </body>
</html>
@endsection