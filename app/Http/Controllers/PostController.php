<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;

class PostController extends Controller
{
    public function index(): string
    {
        $posts = Post::all();
        return view('post.index', compact('posts'));

    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.create', compact('categories', 'tags'));
    }


    public function delete()
    {
        $post = Post::withTrashed()->find(1);
        $post->restore();
        dd('deleted');
    }

    public function firstOrCreate()
    {
        $post = Post::firstOrCreate([
            'title' => 'some tile in php storm'
        ], [
            'title' => 'some tile in php storm',
            'post_content' => 'some content in php strom',
            'image' => 'some image.png',
            'likes' => 1000,
            'is_published' => 1
        ]);
        dump($post->content);
        dd('finished');
    }

    public function updateOrCreate()
    {
        $anotherPost = [
            'title' => 'some tile not in php storm',
            'post_content' => 'create new content in php strom',
            'image' => 'create new image.png',
            'likes' => 1000,
            'is_published' => 1
        ];
        $post = Post::updateOrCreate([
            'title' => 'some tile not in php storm'
        ], $anotherPost);

        dump($post->content);
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => '',
            'tags' => ''
        ]);
        $tags = $data['tags'];
        unset($data['tags']);
        $post = Post::create($data);
        $post->tags()->attach($tags);
        return redirect()->route('post.post');
    }

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => '',
            'tags' => ''
        ]);
        $tags = $data['tags'];
        unset($data['tags']);
        $post->update($data);
        $post->tags()->sync($tags);
        return redirect()->route('post.show', $post->id);

    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.post');
    }
}
