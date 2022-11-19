@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="mb-4 text-end">
            <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back</a>
        </div>

        <div class="card">
            <div class="card-body">
                <h2>Create new post</h2>
                <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label>Enter Title: </label>
                        <input name="title" class="form-control @error('title') is-invalid @enderror" requried type="text" placeholder="Enter title here" />
                        @error('title')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                    <div class="mb-3">
                        <label>Body:</label>
                        <textarea rows="7" name="body" class="form-control @error('body') is-invalid @enderror" requried placeholder="Write your post here"></textarea>
                        @error('body')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Image</label>
                        <input class="form-control @error('image') is-invalid @enderror" type="file" name="image" id="formFile" requried>
                        @error('image')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                    <div><button type="submit" class="btn btn-success">Save</button></div>
                </form>
            </div>
        </div>

    </div>
@endsection
