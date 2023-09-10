<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Admin\Category;
use App\Models\Admin\Tag;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class CreateController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function __invoke()
    {
        $categories=Category::all();
        $tags=Tag::all();
        return view('admin.post.create', compact('categories','tags'));
    }
}
