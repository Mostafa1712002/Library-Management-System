@extends('layouts.app')

@section('content')
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
                                <a type="button" class="btn btn-sm btn-outline-secondary" href="{{ route('orders.create',$book->id) }}">{{ __("message.borrow") }}</a>
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
