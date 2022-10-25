@extends('layouts.app')

@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">الاخبار</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/تعديل خبر </span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<b class="text-center ">
    @include("flash::message")
</b>
<!-- row opened -->
<div class="row row-sm">
    <div class="col-xl-12 col-md-12 col-lg-12">
        <!-- .card -->
        <div class="card container">
            <div class="card-body">
                @include('flash::message')
                {!! Form::model($record,["route"=> ["books.update", $record->id], "enctype" => "multipart/form-data","method" => "PATCH" ]) !!}
                @include('books.form')

                {!! Form::submit("edit", ["class" => "btn btn-success"]) !!}
                {!! Form::close() !!}
            </div>
                  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    @foreach ($record->files as $file)

                    <div class="col">
                        <div class="card shadow-sm">

                            {{ $file }}
                            <div class="card-body">
                                @if(count($record->files) > 1)
                                <form action="{{ route('media.destroy', $file->id ) }}" method="POST">
                                    {!! Form::open() !!}
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-md delete">
                                        {{ __('message.delete') }}
                                    </button>
                                </form>
                                @endif
                            </div>

                        </div>
                    </div>
                    @endforeach

                </div>

            </div>

        </div>
        <!-- /.card -->
    </div>
</div>
<!-- row close -->
</div>
</div>
{{-- Row for fix smooth --}}
<div style="height: 200px">
</div>
@endsection
