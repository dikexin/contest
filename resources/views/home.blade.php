@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach (App\Models\Blog::orderBy('created_at','DESC')->get() as $Blog)
            <div class="card">
                <div class="card-header">
                    #{{$Blog->id}}
                    {{ $Blog->title }} @ {{$Blog->created_at}}

                    @auth
                    <a href="{{route('blogs.edit',[$Blog->id])}}">(Edit)</a>
                    @endauth
                </div>

                <div class="card-body">
                    {!! nl2br($Blog->content) !!}
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
