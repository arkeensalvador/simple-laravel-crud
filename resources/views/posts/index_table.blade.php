@extends('posts.layout.app_layout')

@section('content')
    <div class="container h-100 mt-5">
        <div class="row h-100 justify-content-center align-items-center">
            <h3>Table View</h3>
            <div class="col-12 col-md-12 col-lg-12 table-container">
                @if ($posts->isEmpty())
                    <div class="col-12">
                        <div class="alert alert-info text-center" role="alert">
                            No posts available.
                        </div>
                    </div>
                @else
                    <table id="example" class="row-border" style="width:100%">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Body</th>
                                <th>Date Posted</th>
                                <th>Date Edited</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->body }}</td>
                                    <td>{{ $post->created_at }}</td>
                                    <td>{{ $post->updated_at }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('posts.edit', $post->id) }}"
                                                class="btn btn-primary btn-sm me-2">Edit</a>
                                            <form action="{{ route('posts.destroy', $post->id) }}" method="post"
                                                class="delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Title</th>
                                <th>Body</th>
                                <th>Date Posted</th>
                                <th>Date Edited</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                @endif
            </div>
        </div>
    </div>

@section('scripts')
    <script>
        new DataTable('#example');
    </script>
@endsection
@endsection
