@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.financialYear.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.financial-years.store") }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="required" for="year">{{ trans('cruds.financialYear.fields.year') }}</label>
                    <input class="form-control {{ $errors->has('year') ? 'is-invalid' : '' }}" type="text" name="year"
                           id="year" value="{{ old('year', '') }}" required>
                    @if($errors->has('year'))
                        <span class="text-danger">{{ $errors->first('year') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.financialYear.fields.year_helper') }}</span>
                </div>
                @include('partials.save_form', ['slot' => 'financial-year'])
            </form>
        </div>
    </div>



@endsection
