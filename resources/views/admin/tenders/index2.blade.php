@extends('layouts.admin_test')
@section('content')
    @can('tender_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.tenders.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.tender.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.tender.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                    <tr>
                        <th>
                            {{ trans('cruds.tender.fields.id') }}
                        </th>
                        <th>
                            رمز المناقصة
                        </th>
                        <th>
                            مبلغ الضمان
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($rows as $key => $row)
                        <tr data-entry-id="{{ $row->id }}">
                            <td>
                                {{ $row->id ?? '' }}
                            </td>
                            <td>
                                {{ $row->code ?? '' }}
                            </td>
                            <td>
                                {{ $row->amount_warranty ?? '' }}
                            </td>
                            <td>
                                @can('tender_show')
                                    <a class="btn btn-xs btn-primary"
                                       href="{{ route('admin.tenders.show', $row->id) }}">
                                        {{ __('global.view') }}
                                    </a>
                                @endcan
                                @can('tender_edit')
                                    <a class="btn btn-xs btn-info"
                                       href="{{ route('admin.tenders.edit', $row->id) }}">
                                        {{ __('global.edit') }}
                                    </a>
                                @endcan
                                @can('tender_delete')
                                    <form action="{{ route('admin.tenders.destroy', $row->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('{{ __('global.areYouSure') }}');"
                                          style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger"
                                               value="{{ __('global.delete') }}">
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
