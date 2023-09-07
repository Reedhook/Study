<?php

namespace App\Http\Controllers\Admin\Category;

use App\Models\Category;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class EditController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function __invoke(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }
}