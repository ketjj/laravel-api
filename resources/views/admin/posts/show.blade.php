@extends('layouts.app')

@section('content')
<div class="container my-5">
  <div>
    <h4>{{ $post->title }}</h4>

    @if ($post->tags)
      @foreach ($post->tags as $tag)
        <span class="badge badge-info">{{ $tag->name }}</span>       
      @endforeach
    @endif

    <p>{{  $post->content}}</p>
    <div class="mb-2">{{$post->category ? 'Categoria:'. $post->category->name : ''}}</div>
    <img src="{{ $post->image }}" alt="{{ $post->title }}">
    <h5 class="mt-3">Dr.{{ $post->author }}</h5>

    <a href="{{ route( 'admin.posts.index') }}" class="btn btn-primary"> >>Torna indietro</a>

    <a href="{{ route( 'admin.posts.edit', $post) }}" class="btn btn-primary"> Modifica</a>
  </div>     
@endsection