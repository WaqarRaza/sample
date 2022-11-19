@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="mb-4 text-end">
            <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back</a>
        </div>

        <div class="card">
            <div class="card-body">
                <figure class="figure">
                    <img class="figure-img img-fluid rounded" src="{{ asset('storage/files/' . $record->image) }}">
                </figure>
                <h2>{{ $record->title }}</h2>
                <p>{{ $record->body }}</p>
            </div>
        </div>

    </div>
@endsection
