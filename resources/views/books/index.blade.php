@extends('layouts.app')

@section('content')
<main>
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Library Management System</h1>
                <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>

            </div>
        </div>
    </section>

    <div class="row">
        <div class="col-lg-6 col-md-8 mx-auto">
            <p>
                @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                    @if(admin())
                    <a href="{{ route('books.create') }}" class="btn btn-primary my-2">create book</a>
                    @endIf
                    @endIf
                </div>
                @endif
                @include('flash::message')

            </p>
        </div>
    </div>


    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach($books as $book)

                <div class="col">
                    <div class="card shadow-sm">

                        {{ $book->files[0] }}

                        <div class="card-body">
                            <p class="card-text font-weight-bold ">{{ collect($book->locales)->where('locale',app()->getLocale())->first()->title  }}</p>
                            <b>{{ $book->author }}</b>
                            <p class="card-text">{{ collect($book->locales)->where('locale',app()->getLocale())->first()->description }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    @if(!admin())
                                    <a type="button" class="btn btn-sm btn-outline-secondary" href="{{ route('orders.create') }}">{{ __("message.borrow") }}</a>
                                    @else
                                    <div class="col-6">
                                        <a href="{{ route('books.edit', $book->id) }}" class=" btn btn-success btn-md edit">
                                            {{ __('message.edit') }}
                                        </a>
                                    </div>
                                    <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-md delete">
                                            {{ __('message.delete') }}
                                        </button>
                                    </form>

                                    @endIf
                                </div>
                                <small class="text-muted">{{ $book->isbn }}</small>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach
            </div>
        </div>
    </div>

</main>

@endsection
