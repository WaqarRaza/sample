@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="mb-4  text-end">
            <a href="{{ route('posts.create') }}" class="btn btn-success">Add Post</a>
        </div>
        <div class="row container-fluid justify-content-center">
            @forelse ($records as $record)
                <div class="col-4">
                    <div class="card">
                        <img src="{{ asset('storage/files/' . $record->image) }}" class="card-img-top" alt="image">
                        <div class="card-header">{{ $record->title }}</div>
                        <div class="card-body">{{ $record->body }}</div>
                        <div class="card-footer d-flex">
                            <a href="{{route('posts.show', $record->id)}}" class="btn btn-secondary me-2">View</a>
                            <a href="{{route('posts.edit', $record->id)}}" class="btn btn-info me-2">Edit</a>
                            <form method="post" class="w-100" action="{{route('posts.destroy', $record->id)}}">
                            @csrf @method('delete')
                            <button class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="card">
                    <div class="card-body">
                        No record found
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection
