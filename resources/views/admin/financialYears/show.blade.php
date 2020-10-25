@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.financialYear.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.financial-years.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.financialYear.fields.id') }}
                        </th>
                        <td>
                            {{ $financialYear->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.financialYear.fields.year') }}
                        </th>
                        <td>
                            {{ $financialYear->year }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.financialYear.fields.total_budget') }}
                        </th>
                        <td>
                            {{ $financialYear->budget }}
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.financial-years.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>



@endsection
