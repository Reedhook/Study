<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Requests\Admin\Post\StoreRequest;
use App\Http\Requests\Admin\Post\UpdateRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Admin\Tag;
use App\Models\Admin\Category;
use App\Models\Admin\Post;
use Illuminate\Support\Facades\Storage;

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
        try {
            $data = $request->validated();
            $data['image'] = Storage::put('/image', $data['image']);
            $tags = $data['tag_ids'];
            unset($data['tag_ids']);
            $post = Post::firstOrCreate($data);
            $post->tags()->attach($tags);
        }catch(\Exeption $exeption){
            abort(404);
        }
        return redirect ()->route('admin.post.index');
    }

    public function show(Post $post)
    {

        return view('admin.post.show', compact('post'));
    }


    public function edit(Post $post)
    {
        return view('admin.post.edit', compact('post'));
    }

    public function update(UpdateRequest $request, Post $post)
    {
        $data=$request->validated();
        $post->update($data);
        return view('admin.post.show', compact('post'));
    }

    public function delete(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.post.index');
    }
}
