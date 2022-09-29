<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>データ登録画面</title>
    </head>
    <body>
        <a class='index'>[<a href='/posts/index'>登録した衣類を確認する</a>]</a>
        <h1>登録画面</h1>
        <form action="/posts" method="POST">
            @csrf
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
            
            
            
            <div class="title">
                <h2>Title</h2>
                <input type="text" name="post[title]" placeholder="タイトル" value="{{ old('post.title') }}"/>
                <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
            </div>
            
            <div class="body">
                <h2>Body</h2>
                <textarea name="post[body]" placeholder="コメント記入欄（任意）">{{ old('post.body') }}</textarea>
                <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
            </div>
           
            <input type="submit" value="保存"/>
           
   
   
        </form>
        <div class="back">[<a href="/">back</a>]</div>
       
    </body>
</html>