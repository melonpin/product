<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Requests\PostRequest; // useする
use App\Category;
use App\Condition;
use App\Type;
use App\Http\Controllers\CategoryController;   //追加
use App\Http\Controllers\ConditionController;   //追加
use App\Http\Controllers\TypeController;
 

class PostController extends Controller
{
    public function index(Post $post)
    {
        
         
        return view('posts/index')->with(['posts' => $post->getByLimit(),]);
        
    }

    public function show(Post $post)
    {
        
        
        
        return view('posts/show')->with(['post' => $post]);
    }

    public function create(Post $post, Category $category, Condition $condition, Type $type)
    {
        
    return view('posts/create')->with([
        'conditions' => $condition->get(),
        'categories' => $category->get(),
        'types' => $type->get(),
    ]);   
   
    
    
    }
    

    public function store(Post $post, PostRequest $request) // 引数をRequest->PostRequestにする
    {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    
    public function edit(Post $post)
    {
    return view('posts/edit')->with(['post' => $post]);
    }
    
    public function update(PostRequest $request, Post $post)
    {
    $input_post = $request['post'];
    $post->fill($input_post)->save();

    return redirect('/posts/' . $post->id);
    }
    
    public function delete(Post $post)
    {
    $post->delete();
    return redirect('/');
    }
    
    
    
   
    
}