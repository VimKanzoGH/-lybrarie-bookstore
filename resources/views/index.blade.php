@extends('layouts.web')

@section('content')
    <div class="row">
        @foreach ($books as $book)
            <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="card mb-3">
                    <a href="{{ route('book', $book->slug) }}">
                        <img src="{{ $book->cover->getUrl() }}" class="card-img-top" alt="{{ $book->title }}" />
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">{{ $book->title }} - <small
                                class="price">${{ $book->price }}</small></h5>
                        <p class="card-text">
                            <a href="{{ route('author_book', $book->author->id) }}"
                                class="text-muted">{{ $book->author->name }}
                            </a> ||
                            <a href="#" class="text-muted">
                                {{ $book->published_date }}</a> ||
                            <a href="#" class="text-muted">
                                {{ $book->genre->name }}</a>
                        </p>
                    </div>
                    <div class="card-footer">
                        @if (!in_array($book->id, $userBooks))
                            <a href="{{ route('book', $book->slug) }}" class="btn btn-warning btn-block">View</a>
                        @else
                            <a href="{{ route('library.index') }}" class="btn btn-success btn-block">View in library</a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
