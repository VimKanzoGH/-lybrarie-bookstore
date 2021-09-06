@extends('layouts.web')

@section('content')
    <div class="container py-5">

        <div class="row">
            <div class="col-lg-8 mx-auto">

                <!-- List group-->
                @foreach ($authorBooks as $authorBook)
                    <ul class="list-group shadow">

                        <!-- list group item-->
                        @foreach ($authorBook->books as $book)
                            <li class="list-group-item">
                                <!-- Custom content-->
                                <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                                    <div class="media-body order-2 order-lg-1">
                                        <h5 class="mt-0 font-weight-bold mb-2">{{ $book->title }}</h5>
                                        <p class="font-italic text-muted mb-0 small">{{ $book->blurb }}</p>
                                        <div class="d-flex align-items-center justify-content-between mt-1">
                                            <h6 class="font-weight-bold my-2">Author: {{ $authorBook->name }}</h6>
                                            <h6 class="font-weight-bold my-2">Price: GHC{{ $book->price }}</h6>
                                        </div>
                                    </div>
                                    <img src="{{ $book->cover->getUrl() }}" alt="{{ $book->title }}" width="200"
                                        class="ml-lg-5 order-1 order-lg-2" />
                        @endforeach
            </div>
            <!-- End -->
            </li>
            <!-- End -->

            </ul>
            @endforeach
            <!-- End -->
        </div>
    </div>
    </div>
@endsection
