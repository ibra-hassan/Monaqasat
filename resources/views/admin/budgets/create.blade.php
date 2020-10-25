@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.budget.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.budgets.store") }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="required" for="budget">{{ trans('cruds.budget.fields.budget') }}</label>
                    <input class="form-control {{ $errors->has('budget') ? 'is-invalid' : '' }}" type="number"
                           name="budget" id="budget" value="{{ old('budget', '') }}" step="0.01" required>
                    @if($errors->has('budget'))
                        <span class="text-danger">{{ $errors->first('budget') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.budget.fields.budget_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required"
                           for="directorate_id">المديرية</label>
                    <select class="form-control select2 {{ $errors->has('directorate') ? 'is-invalid' : '' }}"
                            name="directorate_id" id="directorate_id" required>
                        @foreach($directorates as $id => $directorate)
                            <option
                                value="{{ $id }}" {{ old('directorate_id') == $id ? 'selected' : '' }}>{{ $directorate }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('directorate'))
                        <span class="text-danger">{{ $errors->first('directorate') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label class="required"
                           for="financial_year_id">السنة المالية</label>
                    <select class="form-control select2 {{ $errors->has('financial_year') ? 'is-invalid' : '' }}"
                            name="financial_year_id" id="financial_year_id" required>
                        @foreach($financial_years as $id => $financial_year)
                            <option
                                value="{{ $id }}" {{ old('financial_year_id') == $id ? 'selected' : '' }}>{{ $financial_year }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('financial_year'))
                        <span class="text-danger">{{ $errors->first('financial_year') }}</span>
                    @endif
                </div>
                @include('partials.save_form', ['slot' => 'budget'])
            </form>
        </div>
    </div>



@endsection
