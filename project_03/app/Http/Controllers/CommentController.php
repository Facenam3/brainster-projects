<?php

namespace App\Http\Controllers;

use App\Http\Requests\comment\CommentStoreRequest;
use App\Http\Requests\comment\CommentUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\User;
use App\Models\Blog;

class CommentController extends Controller
{
    public function index() {
        $comments = Comment::paginate(10);
        return view('admin.comments.comments', compact('comments'));
    }

    public function addComment() {
        $blogs = Blog::all();
        $users = User::all();
        $comments = Comment::all();
        return view('admin.comments.comment-form', compact(['blogs', 'users', 'comments']));
    }

    public function editComment($id) {
        $comment = Comment::findOrFail($id);
        $blogs = Blog::all();
        $users = User::all();
        $comments = Comment::all();
        return view('admin.comments.comment-edit', compact(['comment','blogs', 'users', 'comments']));
    }

    public function storeComment(CommentStoreRequest $request) {
        Comment::create([
            'comment_body' => $request->comment_body,
            'user_id' => $request->user_id,
            'blog_id' => $request->blog_id,
            'parent_id' => $request->parent_id
        ]);

        return redirect()->route('admin.comments');
    }

    public function updateComment(CommentUpdateRequest $request, Comment $comment) {
        $comment->update($request->all());

        return redirect()->route('admin.comments');
    }

    public function deleteComment($id) {
        $comment = Comment::findOrFail($id);

        $comment->delete();

        return redirect()->route('admin.comments');
    }
}
