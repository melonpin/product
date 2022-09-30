@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="/css/create.css">
        <title>データ登録画面</title>
    </head>
    
    <body>
        <div class="hamburger">
        <span></span>
        <span></span>
        <span></span>
    </div>

    <header class="header">
        <div class="logo">服の買い換え時期計算サイト</div><!-- /.logo -->

        <!-- ハンバーガーメニュー部分 -->
        <div class="drawer">
            <!-- ハンバーガーメニューの表示・非表示を切り替えるチェックボックス -->
            <input type="checkbox" id="drawer-check" class="drawer-hidden" >

                <!-- ハンバーガーアイコン -->
                <label for="drawer-check" class="drawer-open"><span></span></label>

                <!-- 追加：メニューを閉じるための要素 -->
                <label for="drawer-check" class="drawer-close"></label>

                <!-- メニュー -->
                <nav class="drawer-content">
                    <ul class="drawer-list">
                        <li class="drawer-item">
                            <a href="/posts/index">登録した結果を確認する</a>
                        </li>
                    </ul>
                </nav>
            </input>
        </div>
    </header>
    {{Auth::user()->name}}さん、こんにちは！
    <h2>登録画面</h2>
        <form action="/posts" method="POST">
            @csrf
            <h4>服の状態</h4>
            <p class = "condition">
                
                    <select name="post[condition_id]">
                        @foreach($conditions as $condition)
                            <option value="{{ $condition->id }}">{{ $condition->condition }}</option>
                        @endforeach
                    </select>
                
            </p>
            
            <h4>服の種類</h4>
            <p class = "type">
                
                    <select name="post[type_id]">
                        @foreach($types as $type)
                            <option value="{{ $type->id }}">{{ $type->type }}</option>
                        @endforeach
                    </select>
                
            </p>
            <h4>服の素材</h4>
            <p class = "material">
                
                    <select name="post[material_id]">
                        @foreach($materials as $material)
                            <option value="{{ $material->id }}">{{ $material->material }}</option>
                        @endforeach
                    </select>
                
            </p>
            <h4>洗濯頻度の予定</h4>
            <p class = "frequency">
               
                    <select name="post[frequency_id]">
                        @foreach($frequencies as $frequency)
                            <option value="{{ $frequency->id }}">{{ $frequency->frequency }}</option>
                        @endforeach
                    </select>
                
            </p>
                
            <div class="body">
                <h2>コメント</h2>
                    <textarea name="post[body]" placeholder="コメント記入欄（任意）">{{ old('post.body') }}</textarea>
            </div>
           
            <input type="submit" value="保存"/>
        </form>
        
    

    </body>
</html>
@endsection