<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Requests\Admin\Post\StoreRequest;
use App\Models\Admin\Post;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;

class StoreController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function __invoke(StoreRequest $request)
    {
        try {

            $data= $request->validated();
            $data['image']=Storage::put('/image',$data['image']);
            $tags=$data['tag_ids'];
            unset($data['tag_ids']);
            $post=Post::firstOrCreate($data);
            $post->tags()->attach($tags);
        } catch(\Exeption $exeption){
            abort(404);
        }
        return redirect ()->route('admin.post.index');
    }
}
