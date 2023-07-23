<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Models\Post;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(): View
    {
        $posts = Post::paginate(2);
        return view("blog.index", ["posts" => $posts]);
    }


    public function show(string $slug, Post $post): Application|View
    {
        if ($post->slug !== $slug) {
            return redirect("blog.show", ["slug" => $post, "id" => $post->id]);
        }

        return view("blog.show", ["post" => $post]);
    }

    public function create(): View
    {
        $post = new Post();
        return \view("blog.create", ["post" => $post]);
    }

    public function edit(string $slug, Post $post): View
    {
        return \view("blog.create", ["post" => $post]);

    }

    public function update(CreatePostRequest $request, string $slug, Post $post): RedirectResponse
    {
        $post->update($request->validated());
        return redirect()->route('blog.show', ["slug" => $post->slug, 'post' => $post])->with("success", "Article bien modifié");
    }

    public function save(CreatePostRequest $request): RedirectResponse
    {
        $post = Post::create($request->validated());
        return redirect()->route('blog.show', ["slug" => $post->slug, 'post' => $post])->with("success", "Article bien crée");
    }

}
