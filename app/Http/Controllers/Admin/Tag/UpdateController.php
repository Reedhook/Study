<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Requests\Admin\Tag\UpdateRequest;
use App\Models\Tag;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class UpdateController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function __invoke(UpdateRequest $request, Tag $tag)
    {
        $data=$request->validated();
        $tag->update($data);
        return view('admin.tag.show', compact('tag'));
    }
}
