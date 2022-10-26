@extends('layouts.app')



@section('content')
<!-- row opened -->
<div class="row ">
    <div class="col-xl-12 col-md-12 col-lg-12 ">
        <!-- .card -->
        <div class="card container">
            <div class="card-body">
                {!! Form::open([ "method" => "post" , "route" => "books.store","enctype" => "multipart/form-data"]) !!}
                @include('books.form')

                {!! Form::submit("create", ["class" => "btn btn-success"]) !!}

                {!! Form::close() !!}
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
