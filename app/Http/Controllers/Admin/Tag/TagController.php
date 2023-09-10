<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Requests\Admin\Tag\StoreRequest;
use App\Http\Requests\Admin\Tag\UpdateRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Admin\Tag;
class TagController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        $tags=Tag::all();
        return view('admin.tag.index', compact('tags'));
    }

    public function create()
    {
        return view('admin.tag.create');
    }

    public function store(StoreRequest $request)
    {
        $data= $request->validated();
        Tag::firstOrCreate($data);
        return redirect ()->route('admin.tag.index');
    }

    public function show(Tag $tag)
    {
        return view('admin.tag.show', compact('tag'));
    }

    public function edit(Tag $tag)
    {
        return view('admin.tag.edit', compact('tag'));
    }

    public function update(UpdateRequest $request, Tag $tag)
    {
        $data=$request->validated();
        $tag->update($data);
        return view('admin.tag.show', compact('tag'));
    }

    public function delete(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('admin.tag.index');
    }
}
