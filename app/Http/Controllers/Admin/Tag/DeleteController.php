<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Models\Tag;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class DeleteController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function __invoke(Tag $tag)
    {
        $tag->delete();
      return redirect()->route('admin.tag.index');
    }
}
