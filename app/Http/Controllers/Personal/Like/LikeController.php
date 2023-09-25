<?php

namespace App\Http\Controllers\Personal\Like;

use App\Models\Admin\Post;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Admin\Like;
class LikeController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        $posts=auth()->user()->LikedPosts;
        return view('personal.like.index', compact('posts'));
    }

    public function delete(Post $post){
       auth()->user()->LikedPosts()->detach($post->id);
        return redirect()->route('personal.like.index');
    }
}
