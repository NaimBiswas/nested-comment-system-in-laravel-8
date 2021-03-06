@extends('layouts.home')
@section('content')
<div class="container">
    <div class="row">
        <button class="btn btn-md btn-success mb-2 mt-4"><a style="color: aliceblue"
                href="{{ route('post.create') }}">Create Post</a></button>
        <table class="table table-bordered">
            <tr>
                <th>No.</th>
                <th>Title</th>
                <th>Action</th>
            </tr>
            @foreach ($post as $posts)
            <tr>
                <td>${{ $posts->id }}</td>
                <td>{{ $posts->title }}</td>
                <td>
                    <a class="btn btn-md btn-info"
                        href="{{ route('post.show', $posts->slug) }}">Read Post</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
