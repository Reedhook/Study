<?php

namespace App\Http\Controllers\Admin\Main;

use App\Models\Admin\Category;
use App\Models\Admin\Post;
use App\Models\Admin\Tag;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class IndexController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function __invoke()
    {   $data=[];
        $data['usersCount']=User::all()->count();
        $data['categoriesCount']=Category::all()->count();
        $data['tagsCount']=Tag::all()->count();
        $data['postsCount']=Post::all()->count();

        return view('admin.main.index',compact('data'));
    }
}
