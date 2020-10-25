@csrf
<div class="form-group">
    <div class="row">
        <div class="col-6">
            <label class="required" for="name">{{ trans('cruds.tender.fields.name') }}</label>
            <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name"
                   id="name" value="{{ $tender->name ?? old('name', '') }}"
                   required>
            @if($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
            <span class="help-block">{{ trans('cruds.tender.fields.name_helper') }}</span>
        </div>
        <div class="col-6">
            <label class="required" for="code">{{ trans('cruds.tender.fields.code') }}</label>
            <input class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" type="text" name="code"
                   id="code" value="{{ $tender->code ?? old('code', '') }}" required>
            @if($errors->has('code'))
                <span class="text-danger">{{ $errors->first('code') }}</span>
            @endif
            <span class="help-block">{{ trans('cruds.tender.fields.code_helper') }}</span>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-6">
            <label class="required" for="project_id">{{ trans('cruds.tender.fields.project') }}</label>
            <select class="form-control select2 {{ $errors->has('project') ? 'is-invalid' : '' }}"
                    name="project_id" id="project_id" required>
                @foreach($projects as $id => $project)
                    <option value="{{ $id }}"
                        {{ count($errors) > 0 ? (!strcmp($id, old('project_id')) ? 'selected' :''): (isset($tender) && $tender->project->id == $id) ? 'selected' : ''}}>{{ $project }}</option>
                @endforeach
            </select>
            @if($errors->has('project'))
                <span class="text-danger">{{ $errors->first('project') }}</span>
            @endif
            <span class="help-block">{{ trans('cruds.tender.fields.project_helper') }}</span>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-6">
            <label class="required" for="envelope_cost">رسوم شراء المظروف</label>
            <input class="form-control {{ $errors->has('envelope_cost') ? 'is-invalid' : '' }}" type="number"
                   name="envelope_cost" id="envelope_cost" value="{{ old('envelope_cost', '') }}"
                   required>
            @if($errors->has('envelope_cost'))
                <span class="text-danger">{{ $errors->first('envelope_cost') }}</span>
            @endif
        </div>
        <div class="col-6">
            <label class="required" for="amount_warranty">مبلغ الضمان</label>
            <input class="form-control {{ $errors->has('amount_warranty') ? 'is-invalid' : '' }}" type="number"
                   name="amount_warranty" id="amount_warranty" value="{{ old('amount_warranty', '') }}"
                   required>
            @if($errors->has('amount_warranty'))
                <span class="text-danger">{{ $errors->first('amount_warranty') }}</span>
            @endif
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-6">
            <label class="required" for="last_date">اخر موعد لتسليم المظاريف</label>
            <input class="form-control date {{ $errors->has('last_date') ? 'is-invalid' : '' }}" type="text"
                   name="last_date" id="last_date" value="{{ old('last_date') }}" required>
            @if($errors->has('last_date'))
                <span class="text-danger">{{ $errors->first('last_date') }}</span>
            @endif
        </div>
        <div class="col-6">
            <label class="required" for="open_date">تاريخ فتح المظاريف</label>
            <input class="form-control date {{ $errors->has('open_date') ? 'is-invalid' : '' }}" type="text"
                   name="open_date" id="open_date" value="{{ old('open_date') }}" required>
            @if($errors->has('open_date'))
                <span class="text-danger">{{ $errors->first('open_date') }}</span>
            @endif
        </div>
    </div>
</div>
<div class="form-group">
    <label class="required" for="file_path">الملف</label>
    <input type="file" name="file_path" id="file_path" class="form-control-file">
    @if($errors->has('file_path'))
        <span class="text-danger">{{ $errors->first('file_path') }}</span>
    @endif
</div>
<div class="form-group">
    <label for="ad">نص الإعلان</label>
    <textarea class="form-control {{ $errors->has('ad') ? 'is-invalid' : '' }}" name="ad" id="ad" cols="30" rows="10">
        {{ $tender->ad ?? old('ad', '') }}
    </textarea>
    {{--    <input class="form-control {{ $errors->has('ad') ? 'is-invalid' : '' }}" type="text" name="ad"--}}
    {{--           id="ad" value="{{ $tender->ad ?? old('ad', '') }}">--}}
    @if($errors->has('ad'))
        <span class="text-danger">{{ $errors->first('ad') }}</span>
    @endif
</div>
@include('partials.save_form', ['slot' => 'tender'])

