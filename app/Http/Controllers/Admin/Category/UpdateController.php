<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Category;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class UpdateController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function __invoke(UpdateRequest $request, Category $category)
    {
        $data=$request->validated();
        $category->update($data);
        return view('admin.category.show', compact('category'));
    }
}
