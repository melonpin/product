@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="/css/create.css">
        <title>データ登録画面</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    </head>
    <body>
        <h1>服の買い換え時期計算サイト</h1>
        {{Auth::user()->name}}さん、こんにちは！このページでは新しい服を登録することが出来ます。
        <div class="container-fluid">
            <div class="row">
                <div class="col-4">
                    <h4><a href="/posts/index">あなたが登録している衣服</a></h4>
                    <div class="scroll">
                        <span>
                            @foreach ($posts as $post)
                                <div class="table-responsive container">
                                    <table class="table table-bordered table-caption-top">
                                        <caption>{{ $post->created_at }}に登録</caption>
                                        <thead class="thead-light">
                                            <tr>
                                                <th>寿命</th>
                                                <th>服の種類</th>
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
                                                <td href="/types/{{ $post->type->id }}">{{ $post->type->type }}</p></td>
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
                        </span>
                    </div>
                </div>
                
                <div class="col-8">
                    <h2>登録画面</h2>
                    <form action="/posts" method="POST">
                        @csrf
                        
                        <h4>服の状態</h4>
                            <p class = "condition">
                                <select name="post[condition_id]" class="form-control">
                                    @foreach($conditions as $condition)
                                        <option value="{{ $condition->id }}">{{ $condition->condition }}</option>
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
                            <textarea name="post[body]"  class = "form-control"  placeholder="コメント記入欄（任意）">{{ old('post.body') }}</textarea>
                        </p>
                        <p  class = "submit"><input type="submit" class="btn btn-primary mb-3" value="計算する"/></p>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
@endsection