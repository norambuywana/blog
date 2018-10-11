@extends('layouts.app')

@section('content')
<div class="container">

    <h2 class="text-center">Create Post</h2>
    <div class="row justify-content-center">
        <div class="col-md-5 card">
            
            <!-- Post form -->
            <form method="POST" action="{{ route('create_post') }}" class="mt-3">
                {{ csrf_field() }}
                <input type="text" class="form-control form-group" name="title" placeholder="Post title" required>
                <textarea name="body" cols="30" rows="10" class="form-control form-group" name="body" required></textarea>
                <button class="form-group btn btn-primary" type="submit">Create</button>
            </form>
        </div>
    </div>

</div>
@endsection
