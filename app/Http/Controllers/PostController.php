<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of all posts.
     * This corresponds to the "/posts" URL and fetches all posts from the database.
     * It then returns a view to display these posts.
     */
    public function index(): Factory|View|Application
    {
        return view('posts.index')
            ->with('posts', Post::all()->sortByDesc('created_at'));
    }

    /**
     * Show the form for creating a new post.
     * This corresponds to the "/posts/create" URL and returns a view with a form.
     */
    public function create(): Factory|View|Application
    {
        return view('posts.create');
    }

    /**
     * Store a newly created post in the database.
     * This corresponds to the form submission on "/posts/create" and handles the post creation.
     */
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $validatedData['image_path'] = $imagePath;
        }

        $validatedData['user_id'] = auth()->id();

        Post::create($validatedData);

        return redirect()->route('posts.index')->with('success', 'Post created successfully');

        //Same as redirect but better syntax
        //return to_route('posts.index')->with('success', 'Post created successfully');

    }

    /**
     * Display a specific post by its ID.
     * This corresponds to the "/posts/{id}" URL and shows a single post based on the ID.
     */
    public function show($id): Factory|View|Application
    {
        $post = Post::findOrFail($id);

        $randomPosts = Post::where('id', '!=', $id)->inRandomOrder()->take(3)->get();

        return view('posts.show', compact('post', 'randomPosts'));
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {

        $validatedData = $request->validate(
            [
                'title' => 'required|max:255',
                'content' => 'required',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]
        );

        $post = Post::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($post->image_path) {
                Storage::delete($post->image_path);
            }
            $post->image_path = $request->file('image')->store('images', 'public');
        }

        $post->update($validatedData);

        return redirect()->route('posts.index')->with('success', 'Post updates successfully');
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
       $post = Post::findOrFail($id);

        if ($post->user_id !== auth()->id()) {
            return redirect()->route('posts.index')->with('error', 'Unauthorized action.');
        }

       $post->delete();
       return redirect()->route('posts.index')->with('success', 'Post deleted successfully');
    }

}
