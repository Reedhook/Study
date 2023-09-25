<?php

namespace App\Http\Controllers\Personal\Commentary;

use App\Http\Requests\Personal\Comment\UpdateRequest;
use App\Models\Comment;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Admin\Tag;
class CommentaryController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        $comments=auth()->user()->comments;
        return view('personal.commentary.index',compact('comments'));
    }

    public function delete(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('personal.commentary.index');
    }
    public function update(UpdateRequest $request, Comment $comment)
    {
        $data=$request->validated();
        $comment->update($data);
        return redirect()->route('personal.commentary.index');
    }
    public function edit(Comment $comment)
    {
        return view('personal.commentary.edit', compact('comment'));
    }
}
