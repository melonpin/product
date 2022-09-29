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
    return $this::with('category','condition')->orderBy('updated_at', 'DESC')->paginate($limit_count);
}

public function category()
{
    return $this->belongsTo('App\Category');
}

public function condition()
{
    return $this->belongsTo('App\Condition');
}

public function type()
{
    return $this->belongsTo('App\Type');
}

public function material()
{
    return $this->belongsTo('App\Material');
}


public function frequency()
{
    return $this->belongsTo('App\Frequency');
}



protected $fillable = [
    'body',
    'condition_id',
    'material_id',
    'type_id',
    'frequency_id',
   
    
    
    
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