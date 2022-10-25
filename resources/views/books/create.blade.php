@extends('layouts.app')


@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">الاخبار</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/انشاء خبر جديد</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
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
