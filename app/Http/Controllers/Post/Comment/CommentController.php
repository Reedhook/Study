<?php

namespace App\Http\Controllers\Post\Comment;

use App\Http\Requests\Post\Comment\StoreRequest;
use App\Models\Admin\Post;
use App\Models\Comment;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
class CommentController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;



    public function store(Post $post, StoreRequest $request)
    {
        $data=$request->validated();
        $data['user_id']=auth()->user()->id;
        $data['post_id']=$post->id;

        Comment::create($data);
        return redirect()->route('post.show', $post->id);
    }

}
