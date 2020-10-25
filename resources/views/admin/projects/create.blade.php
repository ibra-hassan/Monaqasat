@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.project.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.projects.store") }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="required" for="name">{{ trans('cruds.project.fields.name') }}</label>
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name"
                           id="name" value="{{ old('name', '') }}" required>
                    @if($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.project.fields.name_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required"
                           for="target_number">{{ trans('cruds.project.fields.target_number') }}</label>
                    <input class="form-control {{ $errors->has('target_number') ? 'is-invalid' : '' }}" type="number"
                           name="target_number" id="target_number" value="{{ old('target_number', '') }}" step="1"
                           required>
                    @if($errors->has('target_number'))
                        <span class="text-danger">{{ $errors->first('target_number') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.project.fields.target_number_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="description">{{ trans('cruds.project.fields.description') }}</label>
                    <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text"
                           name="description" id="description" value="{{ old('description', '') }}" required>
                    @if($errors->has('description'))
                        <span class="text-danger">{{ $errors->first('description') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.project.fields.description_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="start_date">{{ trans('cruds.project.fields.start_date') }}</label>
                    <input class="form-control date {{ $errors->has('start_date') ? 'is-invalid' : '' }}" type="text"
                           name="start_date" id="start_date" value="{{ old('start_date') }}" required>
                    @if($errors->has('start_date'))
                        <span class="text-danger">{{ $errors->first('start_date') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.project.fields.start_date_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="estimated_year">{{ trans('cruds.project.fields.estimated_year') }}</label>
                    <input class="form-control {{ $errors->has('estimated_year') ? 'is-invalid' : '' }}" type="number"
                           name="estimated_year" id="estimated_year" value="{{ old('estimated_year', '') }}" max="10"
                           min="1" maxlength="2">
                    @if($errors->has('estimated_year'))
                        <span class="text-danger">{{ $errors->first('estimated_year') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.project.fields.estimated_year_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="cost_primary">{{ trans('cruds.project.fields.cost_primary') }}</label>
                    <input class="form-control {{ $errors->has('cost_primary') ? 'is-invalid' : '' }}" type="number"
                           name="cost_primary" id="cost_primary" value="{{ old('cost_primary', '') }}"
                           required>
                    @if($errors->has('cost_primary'))
                        <span class="text-danger">{{ $errors->first('cost_primary') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.project.fields.cost_primary_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="type_id">{{ trans('cruds.project.fields.type') }}</label>
                    <select class="form-control select2 {{ $errors->has('type') ? 'is-invalid' : '' }}" name="type_id"
                            id="type_id" required>
                        @foreach($types as $id => $type)
                            <option value="{{ $id }}" {{ old('type_id') == $id ? 'selected' : '' }}>{{ $type }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('type'))
                        <span class="text-danger">{{ $errors->first('type') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.project.fields.type_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="nature_id">{{ trans('cruds.project.fields.nature') }}</label>
                    <select class="form-control select2 {{ $errors->has('nature') ? 'is-invalid' : '' }}"
                            name="nature_id" id="nature_id" required>
                        @foreach($natures as $id => $nature)
                            <option
                                value="{{ $id }}" {{ old('nature_id') == $id ? 'selected' : '' }}>{{ $nature }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('nature'))
                        <span class="text-danger">{{ $errors->first('nature') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.project.fields.nature_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="directorate_id">{{ trans('cruds.project.fields.directorate') }}</label>
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
                    <span class="help-block">{{ trans('cruds.project.fields.directorate_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="file_path">{{ trans('cruds.project.fields.file_path') }}</label>
                    <input type="file" name="file_path" id="file_path" class="form-control-file">
                    @if($errors->has('file_path'))
                        <span class="text-danger">{{ $errors->first('file_path') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.project.fields.file_path_helper') }}</span>
                </div>
                @include('partials.save_form', ['slot' => 'project'])
            </form>
        </div>
    </div>



@endsection
