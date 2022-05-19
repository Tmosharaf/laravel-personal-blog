<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::with('post')->simplePaginate(8);

        return view('dashboard.comment.index', compact('comments'));
    }
    public function store(StoreCommentRequest $request)
    {
        Comment::create($request->validated());
        return redirect()->back()->with('message', 'Comment has been added successfully');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->back()->with('message', 'Comment has been deleted successfully');
    }
}
