@extends('layouts.app')

@section('content')
  {{-- @dump($posts); --}}
  <div class="container my-5">     
    <table class="k_table">
      <thead>
        <tr>
          <th class="k_head one">ID</th>
          <th class="k_head two">Title</th>
          <th class="k_head two">Category</th>
          <th class="k_head two">Tag</th>
          <th class="k_head three">Actions</th>

        </tr>
      </thead>
      <tbody>
  
          @foreach ($posts as $post)
          <tr>
              <td> {{$post->id}}</td>
              <td> {{$post->title}}</td>
              <td> {{$post->category ? $post->category->name : '-'}}</td>
              <td>
                
         
                @forelse($post->tags as $tag)
                  <span class="badge badge-info">{{ $tag->name }}</span>                 
                @empty 
                  - 
                @endforelse
              </td>
              <td>

                 <a href="{{ route('admin.posts.show', $post) }}" class="btn btn-warning k_button">SHOW</a>
                  <a href="{{ route('admin.posts.edit', $post)}}" class="btn btn-info k_button">EDIT</a> 
  
                  <form class="d-inline" 
                  onsubmit="return confirm('Sicuro di cancellare {{ $post->title}}?')"
                  action="{{ route('admin.posts.destroy', $post)}}" method="POST">
                  @csrf
                  @method('DELETE')
  
                  <button type="submit" class="btn btn-danger k_button">DELETE</button>
  
                  </form>
         
              </td>
            </tr>
          @endforeach
        
      </tbody>
    </table>
    {{ $posts->links()}}
    


@endsection