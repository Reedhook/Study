<?php

namespace App\Http\Controllers\Post;

use App\Models\Admin\Post;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class CommentController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function index()
    {
        $posts=Post::paginate(4);
        $randomPosts=Post::get()->random(4);
        $likedPosts= Post::withCount('likedUsers')->orderBy('liked_users_count','DESC')->get()->take(4);
        return view('post.index', compact('posts', 'randomPosts','likedPosts'));
    }
    public function show(Post $post){
        $data=Carbon::parse($post->created_at);
        $relatedPosts=Post::where('category_id', $post->category_id)
            ->where('id','!=', $post->id)
            ->get()
            ->take(3);
        return view('post.show', compact('post', 'data', 'relatedPosts'));
    }
}
