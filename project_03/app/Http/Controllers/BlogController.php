<?php

namespace App\Http\Controllers;

use App\Http\Requests\blogs\BlogStoreRequest;
use App\Http\Requests\blogs\BlogUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\User;
use App\Models\BlogBody;
use App\Models\Paragraph;
use App\Models\Comment;

class BlogController extends Controller
{
    public function index() {

        $blogs = Blog::paginate(10);
        return view('admin.blogs.blogs', compact('blogs'));
    }

    public function addBlogForm() {
        $users = User::all();
        return view('admin.blogs.blog-form' , compact('users'));
    }
    
    public function editBlog($blogId){
        $blog = Blog::findOrFail($blogId);
        $users = User::all();
        $paragraphs = $blog->body->paragraphs;
        return view('admin.blogs.edit-blog', compact(['blog', 'users', 'paragraphs']));
    }
    public function storeBlog(Request $request) {

       $request->validate([
            'blog_title' => 'required',
            'user_id' => 'required',
            'paragraphs' => 'required',
            'paragraphs.*.title' => 'nullable|string',
            'paragraphs.*.content' => 'required|string',
       ]);

       $blog = Blog::create([
        'blog_title' => $request->input('blog_title'),
        'user_id' => $request->input('user_id')
        ]);

        $blogBody = BlogBody::create([
            'blog_id' => $blog->id
        ]);

        $paragraphs = json_decode($request->input('paragraphs'), true);
        if (is_array($paragraphs)) {
            foreach ($paragraphs as $paragraph) {
                Paragraph::create([
                    'blog_body_id' => $blogBody->id,
                    'title' => $paragraph['title'] ?? null,
                    'content' => $paragraph['content'],
                ]);
            }
        } else {
            return response()->json(['error' => 'Invalid input format'], 400);
        }

        return response()->json([
            'success' => true,
            'message' => 'Blog created successfully'
        ]);
    }

    public function updateBlog(BlogUpdateRequest $request, Blog $blog) {
        $blog->update($request->only('blog_title', 'user_id'));
        $blogBody = BlogBody::firstOrCreate(['blog_id' => $blog->id]);
        Paragraph::where('blog_body_id', $blogBody->id)->delete();

        foreach ($request->input('paragraphs', []) as $paragraph) {
            Paragraph::create([
                'blog_body_id' => $blogBody->id,
                'title' => $paragraph['title'] ?? null,   
                'content' => $paragraph['content'],      
            ]);
        }

        return redirect()->route('admin.blogs')->with('success', 'Blog and paragraphs updated successfully');
    }

    public function destroy($blogId){
        $blog = Blog::findOrFail($blogId);

        $blog->delete();
        return redirect()->route('admin.users');
    }
}
