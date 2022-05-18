<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(StoreCommentRequest $request)
    {
        Comment::create($request->validated());
        return redirect()->back()->with('message', 'Comment has been added successfully');
    }
}
