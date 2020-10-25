@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.projectType.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.project-types.store") }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="required" for="title">{{ trans('cruds.projectType.fields.title') }}</label>
                    <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title"
                           id="title" value="{{ old('title', '') }}" required>
                    @if($errors->has('title'))
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.projectType.fields.title_helper') }}</span>
                </div>
                @include('partials.save_form', ['slot' => 'project-type'])
            </form>
        </div>
    </div>



@endsection
