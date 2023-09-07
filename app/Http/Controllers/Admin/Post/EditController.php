<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class EditController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function __invoke(Post $post)
    {
        return view('admin.post.edit', compact('post'));
    }
}
