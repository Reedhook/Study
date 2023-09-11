<?php

namespace App\Service\Admin\Post;

use App\Models\Admin\Post;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function store($data)
    {
        try {
            DB::beginTransaction();
            $data['image'] = Storage::put('/image', $data['image']);
            $tags = $data['tag_ids'];
            unset($data['tag_ids']);

            $post = Post::firstOrCreate($data);
            $post->tags()->attach($tags);
            DB::commit();
        } catch (Exception $exeption) {
            DB::rollBack();
            abort(500);

        }
    }

    public function update($data, $post)
    {
        try {
            DB::beginTransaction();
            $tagIds = $data['tag_ids'];
            unset($data['tag_ids']);
            if (isset($data['image'])) {
                $data['image'] = Storage::disk('public')->put('/image', $data['image']);
            }
            $post->update($data);
            $post->tags()->sync($tagIds);
            DB::commit();
        } catch (Exception $exeption) {
            DB::rollBack();
            abort(500);
        }
        return $post;

    }

}

