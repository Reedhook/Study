<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Requests\Admin\Tag\StoreRequest;
use App\Models\Tag;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class StoreController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function __invoke(StoreRequest $request)
    {
        $data= $request->validated();
        Tag::firstOrCreate($data);
        return redirect ()->route('admin.tag.index');
    }
}
