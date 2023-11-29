@extends('layouts.main')
@section('content')
    <div class="row">
        <form action="{{route('post.update', $post->id)}}" method="POST">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="title" aria-describedby="title"
                       value="{{$post->title}}">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea type="text" name="content" class="form-control" id="content" aria-describedby="content">{{$post->content}}</textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="text" name="image" class="form-control" id="image" aria-describedby="image"
                       value="{{$post->image}}">
            </div>
            <div class="mb-3">
                <label for="category">Category</label>
                <select class="form-select" id="category" name="category_id" aria-label="Пример выбора по умолчанию">
                    <option selected>Откройте это меню выбора</option>
                    @foreach($categories as $category)
                        <option
                            {{$category->id == $post->category->id ? 'selected' : ' '}}
                            value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="tags">Tags</label>
                <select multiple class="form-select" id="tags" name="tags[]" aria-label="Пример выбора по умолчанию">
                    @foreach($tags as $tag)
                        <option
                            @foreach($post->tags as $postTag)
                                {{$postTag->id === $tag->id ? 'selected' : ''}}
                            @endforeach
                            value="{{$tag->id}}">{{$tag->title}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
