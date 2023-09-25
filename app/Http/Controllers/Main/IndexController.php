<?php

namespace App\Http\Controllers\Main;

use App\Models\Admin\Post;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use function React\Promise\all;

class IndexController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function __invoke()
    {
        return redirect()->route('post.index');
    }
}
