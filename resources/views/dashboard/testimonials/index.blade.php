@extends('dashboard.layouts.app')

@section('content')

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-body">
            <!-- Zero configuration table -->
            <section id="configuration">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h2>اراء العملاء</h2>

                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">

                                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table class="table  table-bordered zero-configuration dataTable" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                                    <thead>
                                                        <tr role="row">
                                                            <th>الوصف</th>
                                                            <th>تعديل </th>
                                                            <th>حذف</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($models as $model)
                                                        <tr>
                                                            <td>{{ $model->description }}</td>
                                                            <td class="text-center">
                                                                <div class="row">

                                                                    <div class="col-6">
                                                                        <a href="{{ route('testimonials.edit', $model->id) }}" class=" btn btn-success btn-md edit">
                                                                            <i class="ft-edit"></i>
                                                                        </a>
                                                                    </div>

                                                                </div>
                                                            </td>
                                                            <td class="text-center">
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <div data-token="{{ csrf_token() }}" data-id="{{ $model->id }}" data-route="{{ route('testimonials.destroy', $model->id) }}" class="btn btn-danger btn-md" id="destroy">
                                                                            <i class="ft-trash-2"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
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
            </section>


            <!--/ Language - Comma decimal place table -->
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#DataTables_Table_0').DataTable({
            'language': {
                'url': '//cdn.datatables.net/plug-ins/1.10.19/i18n/Arabic.json'
            }
            , "columnDefs": [{
                "targets": 2
                , "orderable": false
                , "searchable": false
            }],

        });
    });

</script>

@endpush
