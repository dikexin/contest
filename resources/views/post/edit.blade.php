@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>Edit Posts</h2>
                @if($errors->any())
                    <div class="aler alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(session('success'))
                    <div class="alert alert-success">
                        updated successfully!
                    </div>
                @endif
                <form action="{{route('blogs.update',[$blog->id])}}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{old('title',$blog->title)}}">
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea type="text" class="form-control" id="content" name="content" rows="5">{{old('content',$blog->content)}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
                <hr>

                <form action="{{route('blogs.destroy',[$blog->id])}}" method="post" onsubmit="return confirm('Are you sure you want to delete this post?')">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Delete This Post</button>
                </form>
            </div>
        </div>
    </div>
@endsection

