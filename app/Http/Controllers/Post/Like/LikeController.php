<?php

namespace App\Http\Controllers\Post\Like;

use App\Http\Requests\Post\Comment\StoreRequest;
use App\Models\Admin\Post;
use App\Models\Comment;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
class LikeController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;



    public function store(Post $post)
    {
        auth()->user()->likedPosts()->toggle($post->id);
        return redirect()->back();
    }

}
