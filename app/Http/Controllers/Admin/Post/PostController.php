<?php

namespace App\Http\Controllers\Admin\Post;

use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Storage;

use App\Http\Requests\Admin\Post\StoreRequest;
use App\Http\Controllers\Admin\Post\BaseController;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Admin\Tag;
use App\Models\Admin\Category;
use App\Models\Admin\Post;

class PostController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        $posts=Post::all();
        return view('admin.post.index', compact('posts'));
    }

    public function create()
    {
        $categories=Category::all();
        $tags=Tag::all();
        return view('admin.post.create',compact('categories','tags'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $this->service->store($data);
        return redirect ()->route('admin.post.index');
    }

    public function show(Post $post)
    {

        return view('admin.post.show', compact('post'));
    }


    public function edit(Post $post)
    {
        $categories=Category::all();
        $tags=Tag::all();
        return view('admin.post.edit', compact('post','categories','tags'));
    }

    public function update(UpdateRequest $request, Post $post)
    {
        $data=$request->validated();
        $post=$this->service->update($data,$post);
        return view('admin.post.show', compact('post'));
    }

    public function delete(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.post.index');
    }
}
