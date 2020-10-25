@extends('layouts.admin')
@section('content')
    @can('committee_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-3 d-flex justify-content-between">
                <a class="btn btn-success" href="{{ route('admin.committees.create') }}">
                    {{ trans('global.create') }} {{ trans('cruds.committee.title_singular') }}
                </a>

                <a class="btn btn-success" href="{{ route('admin.committee-members.create') }}">
                    {{ trans('global.create') }} {{ trans('cruds.committee_member.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.committee.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Required_doc">
                <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.committee.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.committee.fields.name') }}
                    </th>
                    <th>
                        {{ trans('cruds.committee.fields.project') }}
                    </th>
                    <th>
                        {{ trans('cruds.committee.fields.president') }}
                    </th>
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
            {{ trans('cruds.committee_member.title') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <table
                class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Committee_member">
                <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.committee_member.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.committee_member.fields.name') }}
                    </th>
                    <th>
                        {{ trans('cruds.committee_member.fields.phone') }}
                    </th>
                    <th>
                        {{ trans('cruds.committee_member.fields.committee') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
                </thead>
            </table>
        </div>
    </div>



@endsection
@section('scripts')
    @parent
    <script>
        $(function () {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            @can('committee_delete')
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.committees.massDestroy') }}",
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
                ajax: "{{ route('admin.committees.index') }}",
                columns: [
                    {data: 'placeholder', name: 'placeholder'},
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'project_name', name: 'project.name'},
                    {data: 'president_name', name: 'president.id'},
                    {data: 'actions', name: '{{ trans('global.actions') }}'}
                ],
                orderCellsTop: true,
                order: [[1, 'desc']],
                pageLength: 25,
            };

            let dtOverrideGlobals_Member = {
                buttons: dtButtons,
                processing: true,
                serverSide: true,
                retrieve: true,
                aaSorting: [],
                ajax: "{{ route('admin.committee-members.index') }}",
                columns: [
                    {data: 'placeholder', name: 'placeholder'},
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'phone', name: 'phone'},
                    {data: 'committee_name', name: 'committee.name'},
                    {data: 'actions', name: '{{ trans('global.actions') }}'}
                ],
                orderCellsTop: true,
                order: [[1, 'desc']],
                pageLength: 25,
            };
            let table = $('.datatable-Required_doc').DataTable(dtOverrideGlobals);
            let table2 = $('.datatable-Committee_member').DataTable(dtOverrideGlobals_Member);
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function (e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        });

    </script>
@endsection
