@extends('layouts.web')

@section('content')
    <div class="form-inline float-right">
        @csrf
        <input class="form-control mr-sm-2" type="search" name="search_query" id="search_query"
            placeholder="Search for books, author etc." aria-label="Search">
        <button type="button" name="search" id="search" class="btn btn-outline-success my-2 my-sm-0"
            type="submit">Search</button>
    </div>
    <div class="row container">
        @foreach ($books as $book)
            <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="card mb-3">
                    <a href="{{ route('book', $book->slug) }}">
                        <img src="{{ $book->cover->getUrl() }}" class="card-img-top" alt="{{ $book->title }}" />
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">{{ $book->title }} - <small
                                class="price">₵{{ $book->price }}</small></h5>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

<script>
    $("form").on('submit', function(e) {
        e.preventDefault();
        load_data('');

        function load_data(search_query = '') {
            var _token = $("input[name=_token]").val();
            $.ajax({
                url: "{{ route('search_query') }}",
                method: "POST",
                data: {
                    search_query: search_query,
                    _token: _token
                },
                dataType: "json",
                success: function(data) {
                    var output = '';
                    if (data.length > 0) {
                        for (var count = 0; count < data.length; count++) {
                            output += '<tr>';
                            output += '<td>' + data[count].title + '</td>';
                            output += '<td>' + data[count].price + '</td>';
                            output += '<td>' + data[count].published_date + '</td>';
                            output += '<td>' + data[count].blurb + '</td>';
                            output += '<td>' + data[count].author_id + '</td>';
                            output += '</tr>';
                        }
                    } else {
                        output += '<tr>';
                        output += '<td colspan="6">No Data Found</td>';
                        output += '</tr>';
                    }
                    $('tbody').html(output);
                }
            });
        }

        $('#search').click(function() {
            var search_query = $('#search_query').val();
            load_data(search_query);
        });

    })
</script>
