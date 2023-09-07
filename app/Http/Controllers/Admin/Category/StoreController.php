<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Requests\Admin\Category\StoreRequest;
use App\Models\Category;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class StoreController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function __invoke(StoreRequest $request)
    {
        $data= $request->validated();
        Category::firstOrCreate($data);
        return redirect ()->route('admin.category.index');
    }
}
