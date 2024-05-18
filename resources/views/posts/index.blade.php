@extends('posts.layout.app_layout')
@section('content')
    <div class="container mt-5">
        <div class="row">
            @if ($posts->isEmpty())
                <div class="col-12">
                    <div class="alert alert-info text-center" role="alert">
                        No posts available.
                    </div>
                </div>
            @else
                @foreach ($posts as $post)
                    <div class="col-sm-3">
                        <div class="card mb-3 drag-item" draggable="true">
                            <div class="card-header">
                                <h5 class="card-title">{{ $post->title }}</h5>
                            </div>
                            <div class="card-body">
                                <p class="card-text">{{ $post->body }}</p>
                            </div>
                            <div class="card-footer">
                                <div class="d-flex justify-content-start">
                                    <a href="{{ route('posts.edit', $post->id) }}"
                                        class="btn btn-primary btn-sm me-2">Edit</a>
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="post"
                                        class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
