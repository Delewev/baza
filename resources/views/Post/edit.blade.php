@extends('layouts.main')

@section('content')
    <form action="{{route('post.update', $post->id)}}" method="POST">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Title"
                   value="{{$post->title}}">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea type="text" class="form-control" name="content" id="content" placeholder="content">{{$post->content}}</textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="text" class="form-control" name="image" id="image" placeholder="Image" value="{{$post->image}}">
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Сategory</label>
        <select class="form-select" id="category" name="category_id" >
            @foreach($categories as $category)
                <option value="{{$category->id}}" {{$category->id == $post->category->id ? 'selected' : ''}}>
                    {{$category->title}}</option>
            @endforeach
        </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
