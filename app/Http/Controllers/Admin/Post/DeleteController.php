<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Admin\Post;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class DeleteController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function __invoke(Post $post)
    {
        $post->delete();
      return redirect()->route('admin.post.index');
    }
}
