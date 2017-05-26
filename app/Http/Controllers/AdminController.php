<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function posts()
    {
        $user = Auth::user();
        $user->load(['posts' => function($q) {
            $q->orderBy('id', 'desc');
        }]);

        return view('admin.posts', compact('user'));
    }

    public function postForm()
    {
        return view('admin.add_new_post');
    }

    public function postSave(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'cover_image' => 'required|image',
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->cover_image = asset('storage').'/'.$request->cover_image->store('');

        $user = Auth::user();

        $admin_post_info = $user->posts()->save($post);

        if (!empty($admin_post_info)) {
            return redirect()->route('posts.show', ['id' => $admin_post_info->id]);
        }
    }

    public function postEditForm($post_id)
    {
        $post = Post::where('id', $post_id)->where('user_id', Auth::user()->id)->first();
        return view('admin.edit_posts', compact('post'));
    }
}
