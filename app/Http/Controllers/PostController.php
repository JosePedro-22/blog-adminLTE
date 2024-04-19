<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::query()->with('user')->paginate(10);

        return view(
            'dashboard.post.index',
            [
                'posts' => $posts,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::query()->whereActive(true)->get();
        $tags = Tag::where('active', 'on')->get();

        return view('dashboard.post.create', [
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'tags' => 'sometimes|nullable|array',
            'tags.*' => 'exists:tags,id',
            'thumbnail' => 'required | image',
            'category_id' => 'required | exists:categories,id',
            'title' => 'required | string | max:255',
            'content' => 'required | string',
            'status' => 'required| in:Rascunho,Publicado',
        ]);

        $post = auth()->user->posts()->create($data);
        $post->tags()->attach($data['tags']);

        if ($request->hasFile('thumbnail')) {
            $post->media()->create([
                'path' => $request->thumbnail->store('posts')
            ]);
        }

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('dashboard.post.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::query()->whereActive(true)->get();
        $tags = Tag::where('active', 'on')->get();

        return view('dashboard.post.edit', [
            'post' => $post,
            'categories' => $categories,
            'tags' => $tags
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'tags' => 'sometimes|nullable|array',
            'tags.*' => 'exists:tags,id',
            'thumbnail' => 'sometimes | nullable | image',
            'category_id' => 'required | exists:categories,id',
            'title' => 'required | string | max:255',
            'content' => 'required | string',
            'status' => 'required| in:Rascunho,Publicado',
        ]);

        $post->update($data);

        $post->tags()->sync($data['tags'] ?? []);

        if ($request->hasFile('thumbnail')) {
            if ($post->media && Storage::exists(($post->media->path))) {
                Storage::delete($post->media->path);

                $post->media()->update([
                    'path' => $request->thumbnail->store('posts')
                ]);
            } else
                $post->media()->create([
                    'path' => $request->thumbnail->store('posts')
                ]);
        }

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if ($post->media()) {
            if (Storage::exists($post->media->path)) {
                Storage::delete($post->media->path);
            }
            $post->media()->delete();
        }

        $post->delete();

        return back();
    }
}
