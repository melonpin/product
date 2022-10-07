<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Condition;
use App\Type;
use App\Frequency;
use App\Material;
use App\Http\Controllers\CategoryController;   
use App\Http\Controllers\ConditionController;   
use App\Http\Controllers\TypeController;
use App\Http\Controllers\FrequencyController;
use App\Http\Controllers\MaterialController;
 

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

    public function create(Post $post, Condition $condition, Type $type, Frequency $frequency, Material $material)
    {
        return view('posts/create')->with([
            'conditions' => $condition->get(),
            'types' => $type->get(),
            'frequencies' => $frequency->get(),
            'materials' => $material->get(),
            'posts' => $post->getByLimit(),
        ]);   
    }
    

    public function store(Request $request, Post $post)
    {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    
    public function edit(Post $post, Condition $condition,Type $type, Frequency $frequency, Material $material)
    {
    return view('posts/edit')->with([
        'post' => $post,
        'conditions' => $condition->get(),
        'types' => $type->get(),
        'frequencies' => $frequency->get(),
        'materials' => $material->get(),
        
        ]);
    }
    
    public function update(Request $request, Post $post)
    {
    $input_post = $request['post'];
    $post->fill($input_post)->save();

    return redirect('/posts/' . $post->id);
    }
    
    public function delete(Post $post)
    {
    $post->delete();
    return redirect('/posts/index');
    }
    
    
    
   
    
}