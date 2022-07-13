@extends('layouts.app')

@section('content')
<div class="container my-5">
  <h3>Inserisci un nuovo post</h3>

  @if($errors->any())
    @foreach($errors->all() as $error)
      @endforeach
  @endif

  <form action="{{ route('admin.posts.update', $post)}}" method="POST">
    @csrf
    @method('PUT')
    
    <div class="form-group my-3">
      <label for="title" class="my-2" >Titolo</label>
      <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="titolo da inserire"
      value="{{ $post->title}}">
      @error('title')
       <div class="custom_error">{{ $message}}</div>
      @enderror
    </div>

    <div class="form-group my-3">
      <label for="content" class="my-2">Contenuto</label>
      <input type="text" name="content" class="form-control @error('content') is-invalid @enderror" placeholder="contenuto"
      value="{{ $post->content}}">
      @error('content')
      <div class="custom_error">{{ $message}}</div>
     @enderror
    </div>

    <div class="my-4">
      <label for="category_id">Categoria: </label>
      <select class="form-select" name="category_id">
        <option value="">Seleziona una categoria</option>
        @foreach ($categories as $category)

         <option @if($category->id == old('category_id', $post->category ? $post->category->id : '' )) selected @endif value="{{ $category->id}}">{{$category->name}}</option>
        @endforeach

      </select>
    </div>

    <div class="form-group my-3">
      <p>Tags:</p>

      @foreach ($tags as $tag)

      @if(old('tags'))
        <input type="checkbox"
        name="tags[]"
        id="{{$tag->slug}}"
        value="{{ $tag->id }}"
        @if (in_array($tag->id, old('tags', []))) checked @endif>
      @else
        <input type="checkbox"
        name="tags[]"
        id="tag{{ $loop->iteration }}"
        value="{{ $tag->id }}"
         @if ($post->tags->contains($tag)) checked @endif>

      @endif

        <label class="mr-3 mt-2" for="tag{{ $loop->iteration }}">{{$tag->name}}</label>       
      @endforeach

      @error('tags')
        <div class="custom_error">{{ $message}}</div>
      @enderror

    </div>


    <div class="form-group my-3">
      <label for="image" class="my-2">URL immagine</label>
      <input type="text" name="image" class="form-control @error('image') is-invalid @enderror" placeholder="URL immagine"
      value="{{ $post->image }}">
      @error('image')
      <div class="custom_error">{{ $message}}</div>
     @enderror
    </div>

    <div class="form-group my-3">
      <label for="author" class="my-2">Autore</label>
      <input type="text" name="author" class="form-control @error('author') is-invalid @enderror" placeholder="autore del post"
      value="{{ $post->author }}">
      @error('author')
      <div class="custom_error">{{ $message}}</div>
     @enderror
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
@endsection