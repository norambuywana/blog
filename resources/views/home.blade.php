@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="text-center">Blog Posts</h1>

    <div class="row justify-content-center">

        <!-- All posts container -->
        <div class="col-md-8">
            @foreach($posts as $post)
                <div class="card mb-2">
                    <h1 class="card-header text-center"><a href="{{ route('post', $post->id) }}">{{$post->title}}</a></h1>
                    <div class="card-body">
                        <p>{{$post->body}}<p>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-between">
                            <div>{{$post->user['name']}}</div>  
                            <div>{{$post->created_at}}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</div>

@endsection
