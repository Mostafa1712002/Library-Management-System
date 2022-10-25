@extends('dashboard.layouts.master')
@section('title')
تعديل خبر | {{ config('app.name') }}
@endsection
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
        <div class="card">
            <div class="card-body">
                @include('flash::message')
                {!! Form::model($record,["route"=> ["blogs.update", $record->id], "enctype" => "multipart/form-data","method" => "PATCH" ]) !!}
                @include('books.form')
                {!! Form::submit("edit", ["class" => "btn btn-success"]) !!}
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
