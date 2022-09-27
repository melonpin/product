<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  /**
 * Post一覧を表示する
 * 
 * @param Post Postモデル
 * @return array Postモデルリスト
 */
public function index(Post $post)
{
    return $post->get();
}

public function getByLimit(int $limit_count = 5)
{
    return $this::with('category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
}

public function category()
{
    return $this->belongsToMany('App\Category');
}

public function Condition()
{
    return $this->belongsToMany('App\Condition');
}
protected $fillable = [
    'title',
    'body',
    'category_id',
    
    
];
public function up()
    {
        // 対象の存在をしていれば、処理を中断する
        if(Schema::hasTable('users')){
            return;
        }
        // 対象のテーブルを作成する
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email',255)->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }
}