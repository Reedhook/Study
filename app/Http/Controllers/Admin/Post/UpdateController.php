<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Post;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class UpdateController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function __invoke(UpdateRequest $request, Post $post)
    {
        $data=$request->validated();
        $post->update($data);
        return view('admin.post.show', compact('post'));
    }
}
