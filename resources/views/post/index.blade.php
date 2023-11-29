@extends('layouts.main')
@section('content')
    <div class="row">
        <div><a href="{{route('post.create')}}" class="btn btn-secondary mb-3">Add</a></div>
        @foreach($posts as $post)
           <div> <a href="{{route('post.show', $post->id)}}">{{$post->id}} . {{$post->title}}</a></div>
        @endforeach
    </div>
    <div class="row">
        {{$posts->withQueryString()->links()}}
    </div>
@endsection
