@extends('dashboard.layouts.master')
@section('title')
الاخبار | {{ config('app.name') }}
@endsection
@section('page-header')
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">الأخبار</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/عرض الأخبار </span>
        </div>
    </div>
</div>
@endsection
@section('content')
<!-- row opened -->
<b class="text-center ">
    @include("flash::message")
</b>
<div class="row row-sm">
    <div class="d-flex justify-content-center mt-2 mb-2">
        <a type="button" href="{{ route('blogs.create') }}" style="color:white" class="btn-md btn  btn-primary">
            <i class="fa fa-plus" aria-hidden="true"></i>
            انشاء خبر جديد
        </a>
    </div>
    <div class="col-xl-12">
        <div class="card">

            <div class="card-body">
                <div class="table-responsive">
                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table text-md-nowrap dataTable no-footer" id="example1" role="grid" aria-describedby="example1_info">
                                    <thead>
                                        <tr role="row">
                                            <th>ID</th>
                                            <th>العنوان</th>
                                            <th>الصورة</th>
                                            <th>التاريخ</th>
                                            <th>الحالة</th>
                                            <th>العمليات</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($records as $record)
                                        <tr id="row{{ $record->id }}">
                                            <td>{{ $record->id }}</td>
                                            <td>
                                                <p>
                                                    {{ $record->title }}
                                                </p>
                                            </td>
                                            <td><img src="{{ $record->image["url"] }}" alt="{{ $record->title }}" width="100"></td>
                                            <td>{{ $record->published_at }}</td>
                                            <td>
                                                @if($record->status == "published")
                                                <span class="badge badge-md badge-success ">مفعل</span>
                                                @else
                                                <span class="badge badge-md badge-danger">غير مفعل</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('blogs.edit', $record->id) }}" class="btn btn-md btn-primary">تعديل</a>
                                                <a class="btn btn-md destroy btn-danger" data-route="{{ route("blogs.destroy",$record->id) }}" data-token="{{ csrf_token() }}" data-row="#row{{ $record->id }}">حذف</a>

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
        </div>
    </div>


</div>
<!-- /row -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
@endsection
@push('js')
<script>
    $(function() {
        $(document).on('click', '.destroy', function() {

            var route = $(this).data('route');
            var token = $(this).data('token');
            var $row = $(this).data("row");

            $.confirm({
                title: 'تأكيد عملية الحذف'
                , icon: 'fa fa-spinner fa-spin'
                , content: 'هل انت منأكد انك تريد الحذف'
                , type: 'red'
                , closeAnimation: 'rotateXR'
                , buttons: {
                    yes: {
                        text: 'نعم'
                        , btnClass: 'btn-blue'
                        , action: function() {
                            $.ajax({
                                url: route
                                , type: 'post'
                                , data: {
                                    _method: 'delete'
                                    , _token: token
                                }
                                , dataType: 'json'
                                , success: function(data) {
                                    if (data.success) {
                                        $($row).remove();
                                        Swal.fire("تم الحذف", " ", "success");
                                    }
                                }
                                , error: function() {
                                    Swal.fire("حدث خطأ الرجاء المحاوله مره اخري", "", "error")
                                }
                            });
                        }
                    }
                    , no: {
                        text: 'لا'
                        , btnClass: 'btn-blue'
                    }
                , }
            , });
        });

    });

</script>
@endpush
