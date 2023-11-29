@extends('layouts.main')
@section('content')
    <div class="row">
            <div>{{$post->id}} . {{$post->title}}</div>
            <div>{{$post->content}}</div>
    </div>
    <div><a href="{{route('post.edit', $post->id)}}" class="btn btn-dark mb-3">Edit</a></div>
    <form action="{{route('post.delete', $post->id)}}" method="POST">
        @csrf
        @method('delete')
        <input type="submit" value="Delete" class="btn btn-danger mb-3">
    </form>
    <div><a href="{{route('post.index')}}">Back</a></div>
@endsection
