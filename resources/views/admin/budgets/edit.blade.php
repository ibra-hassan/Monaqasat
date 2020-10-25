@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.budget.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.budgets.update", [$budget->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="budget">{{ trans('cruds.budget.fields.budget') }}</label>
                <input class="form-control {{ $errors->has('budget') ? 'is-invalid' : '' }}" type="number" name="budget" id="budget" value="{{ old('budget', $budget->budget) }}" step="0.01" required>
                @if($errors->has('budget'))
                    <span class="text-danger">{{ $errors->first('budget') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.budget.fields.budget_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection