<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\comment\CommentStoreRequest;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Comment;

class UserController extends Controller
{
   public function home() {
      return view('welcome');
   }

   public function index() {
    return view('dashboard');
   }

   public function blogs() {
      $blogs = Blog::all();
      return view('user.blogs.index', compact('blogs'));
   }

   public function singleBlog($id) {
      $blog = Blog::findOrFail($id);
      $paragraphs = $blog->body->paragraphs;
      $comments = $blog->comments;
      return view('user.blogs.single-blog',compact(['blog', 'paragraphs', 'comments']));
   }

   public function storeComment(Request $request){

      $request->validate([
         'comment_body' => 'required|string|max:1000',
         'blog_id' => 'required|exists:blogs,id',
         'user_id' => 'required|exists:users,id',
     ]);

     $comment = Comment::create([
         'comment_body' => $request->comment_body,
         'user_id' => $request->user_id,
         'blog_id' => $request->blog_id,
         'parent_id' => $request->parent_id
     ]);

    return response()->json([
            'user_avatar' => $comment->user->profile_picture, // Adjust according to your User model
            'user_name' => $comment->user->name,
            'created_at' => $comment->created_at->format('Y-m-d H:i:s'),
            'comment_body' => $comment->comment_body,
        ]);
   }
}
