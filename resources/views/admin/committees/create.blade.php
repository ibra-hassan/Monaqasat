@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.committee.title_singular') }}
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route("admin.committees.store") }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="required" for="name">{{ trans('cruds.committee.fields.name') }}</label>
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name"
                           id="name" value="{{ old('name', '') }}" required>
                    @if($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.committee.fields.name_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="project_id">{{ trans('cruds.committee.fields.project') }}</label>
                    <select class="form-control select2 {{ $errors->has('project') ? 'is-invalid' : '' }}"
                            name="project_id" id="project_id" required>
                        @foreach($projects as $id => $project)
                            <option
                                value="{{ $id }}" {{ old('project_id') == $id ? 'selected' : '' }}>{{ $project }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('project'))
                        <span class="text-danger">{{ $errors->first('project') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.committee.fields.project_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="president_id">{{ trans('cruds.committee.fields.president') }}</label>
                    <select class="form-control select2 {{ $errors->has('president') ? 'is-invalid' : '' }}"
                            name="president_id" id="president_id">
                        @foreach($presidents as $id => $president)
                            <option
                                value="{{ $id }}" {{ old('president_id') == $id ? 'selected' : '' }}>{{ $president }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('president'))
                        <span class="text-danger">{{ $errors->first('president') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.committee.fields.president_helper') }}</span>
                </div>
                @include('partials.save_form', ['slot' => 'committee'])
            </form>
        </div>
    </div>

@endsection
