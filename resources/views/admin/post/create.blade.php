@extends('layouts.admin')

@section('content')
    <form action="{{route('post.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input
                value="{{old('title')}}"
                type="text" class="form-control" name="title" id="title" placeholder="Title">
            @error('title')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea type="text" class="form-control" name="content" id="content"
                      placeholder="content">{{old('content')}}</textarea>
            @error('content')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div>
            <select class="form-select" id="category" name="category_id">
                @foreach($categories as $category)
                    <option
                        {{old('category_id') == $category->id ? ' selected': ''}}
                        value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>
            @error('category_id')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input value="{{old('image')}}" type="text" class="form-control" name="image" id="image"
                   placeholder="Image">
        </div>
        @error('image')
        <p class="text-danger">{{$message}}</p>
        @enderror
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
