@extends('layouts.app')

@section('title')
    | Genres
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5>Genres</h5>
                        <a href="{{ route('admin.genres.create') }}" class="btn btn-primary btn-sm">New Genre</a>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Name</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($genres as $genre)
                                    <tr>
                                        <td class="text-center">{{ $genre->id }}</td>
                                        <td>{{ $genre->name }}</td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a href="{{ route('admin.genres.edit', $genre->id) }}"
                                                    class="btn btn-info btn-sm">Edit</a>
                                                <form action="{{ route('admin.genres.destroy', $genre->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
