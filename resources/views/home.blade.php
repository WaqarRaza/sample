@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Todo List</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Status</th>
                </tr>
                <thead>
                <tbody>
                    @forelse($records as $record)
                        <tr>
                            <td>{{ $record->title }}</td>
                            <td>{{ $record->completed ? 'Completed' : 'Not Completed' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2"> No record found</td>
                        </tr>
                    @endforelse
                </tbody>
        </table>

    </div>
@endsection
