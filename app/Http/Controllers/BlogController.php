<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class BlogController extends Controller
{
    public function index(): View
    {
//        $category1 = new Category(["name"=> "Category 1"]);
//        $category1->save();
//        $category2 = new Category(["name"=> "Category 2"]);
//        $category2->save();
//        $post = Post::find(1);
//        $post->tags()->createMany([
//            ["name" => "Tag 1 "],
//            ["name" => "Tag 2 "],
//        ]);
//        $post->save();
//        dd($post->tags);

        $posts = Post::paginate(5);
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
        return \view("blog.create", [
            "post" => $post,
        ]);

    }

    public function update(CreatePostRequest $request, string $slug, Post $post): RedirectResponse
    {

        $post->update($this->extractData($post, $request));
        $post->tags()->sync($request->validated('tags'));

        return redirect()->route('blog.show', ["slug" => $post->slug, 'post' => $post])->with("success", "Article bien modifié");
    }

    private function extractData(Post $post, CreatePostRequest $request): array
    {
        $data = $request->validated();
        /** @var UploadedFile|null $image * */
        $image =  $request->validated("image");
        if ($image === null || $image->getError())
            return $data;
        if ($post->image)
            \Storage::disk("public")->delete($post->image);

        $data["image"] = $image->store("blog", "public");
        return $data;
    }

    public function save(CreatePostRequest $request): RedirectResponse
    {
        $post = Post::create($this->extractData(new Post(), $request));
        return redirect()->route('blog.show', ["slug" => $post->slug, 'post' => $post])->with("success", "Article bien crée");
    }

}
