@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.tender.title_singular') }}
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route("admin.tenders.store") }}" enctype="multipart/form-data">
                @include('admin.tenders.form')
                {{--                <label class="required" for="required_doc_id">المستندات المطلوبة</label>--}}
                {{--                <select class="form-control select2 {{ $errors->has('required_doc') ? 'is-invalid' : '' }}"--}}
                {{--                        name="required_doc_id" id="required_doc_id"--}}
                {{--                        multiple--}}
                {{--                        required>--}}
                {{--                    @foreach($required_docs as $id => $required_doc)--}}
                {{--                        <option value="{{ $id }}"--}}
                {{--                            {{ count($errors) > 0 ? (!strcmp($id, old('required_doc_id')) ? 'selected' :''): (isset($tender) && $tender->required_doc->id == $id) ? 'selected' : ''}}>{{ $required_doc }}</option>--}}
                {{--                    @endforeach--}}
                {{--                </select>--}}
                {{--                @if($errors->has('required_doc'))--}}
                {{--                    <span class="text-danger">{{ $errors->first('required_doc') }}</span>--}}
                {{--                @endif--}}
            </form>
        </div>
    </div>
@endsection
