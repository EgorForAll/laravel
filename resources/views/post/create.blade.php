@extends('layouts.main')
@section('content')
    <div class="row">
        <form action="{{route('post.store')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="title" aria-describedby="title"
                       placeholder="title" value="{{old('title')}}">
                @error('title')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea type="text" name="content" class="form-control" id="content" aria-describedby="content"
                          placeholder="content">{{old('content')}}</textarea>
                @error('content')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="text" name="image" class="form-control" id="image" aria-describedby="image"
                       placeholder="image" value="{{old('image')}}">
                @error('image')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="category_id">Category</label>
                <select class="form-select" id="category_id" name="category_id" aria-label="Пример выбора по умолчанию">
                    <option selected>Откройте это меню выбора</option>
                    @foreach($categories as $category)
                        <option
                            {{old('category_id') == $category->id ? 'selected' : ' '}}
                            value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="tags">Tags</label>
                <select multiple class="form-select" id="tags" name="tags[]" aria-label="Пример выбора по умолчанию">
                    @foreach($tags as $tag)
                        <option value="{{$tag->id}}">{{$tag->title}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>
@endsection
