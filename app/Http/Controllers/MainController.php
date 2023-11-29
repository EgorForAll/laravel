<?php

namespace App\Http\Controllers;

use App\Models\Post;

class MainController extends Controller
{
    public function index(): string
    {
    $posts = Post::all();
    return  view('main');

    }

}
