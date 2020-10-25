@extends('layouts.admin')
@section('content')
    @can('tender_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.tenders.create') }}">
                    {{ trans('global.create') }} {{ trans('cruds.tender.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.tender.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Required_doc">
                <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.tender.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.tender.fields.name') }}
                    </th>
                    <th>
                        {{ trans('cruds.tender.fields.code') }}
                    </th>
                    <th>
                        {{ trans('cruds.tender.fields.project') }}
                    </th>
                    {{--                    <th>--}}
                    {{--                        الحالة--}}
                    {{--                    </th>--}}
                    <th>
                        &nbsp;
                    </th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
    <div class="card mt-lg-5">
        <div class="card-header">
            المناقصات الغير معلنة
        </div>

        <div class="card-body">
            @if(count($rows) > 0)
                <table class=" table table-bordered table-striped table-hover">
                    <thead>
                    <tr>
                        <th>
                            {{ trans('cruds.tender.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.tender.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.tender.fields.code') }}
                        </th>
                        <th>
                            نص الأعلان
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($rows as $key => $row)
                        <tr>
                            <td>
                                {{ $row->id ?? '' }}
                            </td>
                            <td>
                                {{ $row->name ?? '' }}
                            </td>
                            <td>
                                {{ $row->code ?? '' }}
                            </td>
                            <td>
                                {{ $row->ad ?? '' }}
                            </td>
                            <td>
                                @can('tender_show')
                                    <a class="btn btn-xs btn-primary"
                                       href="{{ route('admin.tenders.show', $row->id) }}">
                                        {{ __('global.view') }}
                                    </a>
                                @endcan
                                @can('ad_tender')
                                    <a class="btn btn-xs btn-secondary"
                                       href="{{ route('admin.tenders.ad', $row->id) }}">
                                        إعلان
                                    </a>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <tr>
                    لا يوجد حسابات غير مفعلة
                </tr>
            @endif
        </div>
    </div>



@endsection
@section('scripts')
    @parent
    <script>
        $(function () {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            @can('tender_delete')
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.tenders.massDestroy') }}",
                className: 'btn-danger',
                action: function (e, dt, node, config) {
                    var ids = $.map(dt.rows({selected: true}).data(), function (entry) {
                        return entry.id
                    });
                    if (ids.length === 0) {
                        alert('{{ trans('global.datatables.zero_selected') }}')
                        return
                    }
                    if (confirm('{{ trans('global.areYouSure') }}')) {
                        $.ajax({
                            headers: {'x-csrf-token': _token},
                            method: 'POST',
                            url: config.url,
                            data: {ids: ids, _method: 'DELETE'}
                        })
                            .done(function () {
                                location.reload()
                            })
                    }
                }
            }
            dtButtons.push(deleteButton)
            @endcan

            let dtOverrideGlobals = {
                buttons: dtButtons,
                processing: true,
                serverSide: true,
                retrieve: true,
                aaSorting: [],
                ajax: "{{ route('admin.tenders.index') }}",
                columns: [
                    {data: 'placeholder', name: 'placeholder'},
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'code', name: 'code'},
                    {data: 'project_name', name: 'project.name'},
                    // {data: 'tender_status_id', name: 'tender_status_id'},
                    {data: 'actions', name: '{{ trans('global.actions') }}'}
                ],
                orderCellsTop: true,
                order: [[1, 'desc']],
                pageLength: 25,
            };
            let table = $('.datatable-Required_doc').DataTable(dtOverrideGlobals);
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function (e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        });

    </script>
@endsection
