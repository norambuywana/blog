@extends('layouts.app')

@section('content')

<div class="container">

    <!-- Post body -->
    <h2 class="text-center">{{$post->title}}</h2>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="d-flex justify-content-between">
                <div>{{$post->user['name']}}</div>  
                <div>{{$post->created_at}}</div>
            </div>
            <hr>
            <div class="col-md-12">
                <p>{{$post->body}}</p>
            </div>
        </div>
    </div>

    <!-- Comment form -->
    <div class="row justify-content-center">
        <div class="col-md-5 card">
            <form method="POST" action="{{ route('create_comment') }}" class="mt-3">
                {{ csrf_field() }}
                <input type="hidden" name="post_id" value="{{$post->id}}">
                @guest
                    <input type="text" class="form-control form-control-sm form-group" name="author" placeholder="Name">
                @else
                    <input type="hidden" name="author" value="{{ Auth::user()->name }}">
                @endguest

                <textarea name="body" cols="30" rows="2" class="form-control form-control-sm form-group" placeholder="Leave a comment.." required></textarea>
                <button class="form-group btn btn-primary btn-sm" type="submit">Create</button>
            </form>
        </div>
    </div>

    <!-- Comments -->
    <div class="row justify-content-center mt-5">
        <div class="col-md-5">
        @foreach($post->comments as $comment)
            <div class="card mb-2">
                <p class="card-body">{{$comment->body}}</p>
                <p class="card-footer">{{$comment->author}}</p>
            </div>
        @endforeach
        </div>
    </div>
    

</div>

@endsection
